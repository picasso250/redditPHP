<form action="">
    <div>your name:
        <input type="text" disabled name="name">
    </div>
    <div>
        <input type="text" name="title" placeholder="标题">
        <br>
        <input type="text" name="url" placeholder="url">
        <br>
        <textarea name="text" id="" cols="30" rows="10"></textarea>
        <br>
        <button>ok</button>
    </div>
</form>
<script>
    $(function() {
        let name = Cookies.get('name');
        $('[name=name]').val(name)
    })
</script>