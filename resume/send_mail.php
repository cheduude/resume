<?php
// Подключаем библиотеку PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Подключаем автозагрузчик PHPMailer
require 'vendor/autoload.php';

// Проверяем, была ли отправлена форма
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Получаем данные из формы
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    // Адрес электронной почты, на который нужно отправить сообщение
    $to = 'youradress@test.com';
    
    // Создаем экземпляр PHPMailer
    $mail = new PHPMailer(true);
    
    try {
        // Настройки SMTP сервера Mailcatcher
        $mail->isSMTP();
        $mail->Host = 'localhost';
        $mail->Port = 1025;
       
        // Отправитель
        $mail->setFrom($email, $name);
        
        // Получатель
        $mail->addAddress($to);
        
        // Заголовок письма
        $mail->Subject = 'New message from ' . $name;
        
        // Текст письма
        $mail->Body = "Name: $name\n\n";
        $mail->Body .= "Mail from: $email\n\n";
        $mail->Body .= "Message:\n$message";
        
        // Отправляем письмо
        $mail->send();
        
        // Если письмо успешно отправлено, перенаправляем на страницу успешной отправки
        header('Location: success.php');
        exit;
    } catch (Exception $e) {
        // Если произошла ошибка при отправке, выводим сообщение об ошибке
        echo 'There was an error sending your message. Please try again later.';
    }
}
?>
