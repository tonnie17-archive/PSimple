<html>
<head>
    <title>Index</title>
</head>
<body>
    <?php if ($hasSuccess) echo '注册成功,' . $name ?>
    <form method="post" action="/user/register">
        <label>输入你的姓名注册用户:</label>
        <input name="name" />
        <button type="submit">确认</button>
    </form>
</body>
</html>
