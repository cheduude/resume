<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Успешная отправка</title>
    <link href="main.css" rel="stylesheet">
</head>
<body>
	<style>
		.back_button {
    background-color: #204d74;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.back_button:hover {
    background-color: #fff;
    color: #204d74;
    border: 1px solid #204d74;
}
	</style>
    <header>
        <h1>Успешная отправка</h1>
    </header>
    <section>
        <p class="success-message">Ваше сообщение успешно отправлено. Мы свяжемся с вами в ближайшее время.(http://localhost:8025)</p>
        <button onclick="goBack()" class="back_button">Назад</button>
    </section>
        <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>