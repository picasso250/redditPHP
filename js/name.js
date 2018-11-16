'use strict';

const e = React.createElement;

class LikeButton extends React.Component {
  constructor(props) {
    super(props);
    this.state = { name:"" };
  }

  componentDidMount(){
    let name = Cookies.get('name');
    console.log("componentDidMount",name)
    this.setState({
      name
    })
  }
  handleClick(){
    let v = document.getElementById('name_').value;
    Cookies.set('name', v, { expires: 700 });
    this.setState({
      name: v
    })
  }
  render() {
    if (this.state.liked) {
      return 'You liked this.';
    }

    return this.state.name ? (
       <div>{this.state.name}</div>
    ) : (
      <div>
        你的名字：
        <input type="text" id="name_" />
        <button onClick={this.handleClick}>确定</button>
      </div>
    );
  }
}