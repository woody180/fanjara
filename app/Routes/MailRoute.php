<?php

use App\Engine\Libraries\Router;
use  App\Engine\Libraries\Validation;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


$router = Router::getInstance();





$router->get('call-request', function($req, $res)
{
    if (!$req->isAjax()) abort();
    return $res->render('ajax_views/call_request');
});

$router->post('call-request', function($req, $res)
{
    if (!$req->isAjax()) abort();
    
    
    $validation = new Validation();
   
    // Get request data
    $body = $req->body();

    // Valdiate request data
    $errors = $validation
            ->with($body)
            ->rules([
                'fullname|Full name' => 'required|alpha_spaces|max[50]|min[3]',
                'phone|Phone' => 'required|num|min[9]',
            ])
            ->validate();
    
    // If errors
    if (!empty($errors)) return $res->send(['errors' => $errors]);
    
    
    
    
    // Send mail
    $mail = new PHPMailer(true);
    try {

        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'info@fanjara.ge';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'mail@fanjara.ge';
        $mail->Password   = 'infoAV12345';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;      

        //Recipients
        $mail->setFrom('info@fanjara.ge', 'fanjara.ge');
        $mail->addAddress('info@fanjara.ge');

        //Content
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $mail->Subject = 'fanjara.ge - ზარის მოთხოვნა';
        $mail->Body    = ""
            . "სახელი: {$req->body('fullname')} <br> "
            . "ტელეფონი: {$req->body('phone')} <br> ";

        $mail->send();
        
        return $res->send(['success' => App\Engine\Libraries\Languages::translate([
            'ge' => 'შეტყობინება წარმატებით გაიგზავნა.',
            'en' => 'Message sent successfully.',
            'ru' => 'Сообщение успешно отправлено.'
        ])]);
        
    } catch (Exception $e) {
        
        return $res->send(['error' => App\Engine\Libraries\Languages::translate([
            'ge' => 'შეტყობინების გაგზავნისას დაფიქსირდა შეცდომა. სცადეთ თავიდან.',
            'en' => 'An error occurred while sending the message. Try again.',
            'ru' => 'При отправке сообщения произошла ошибка. Попробуйте еще раз.'
        ])]);
        
    }
    
});

























$router->post('mail', function($req, $res) {
    
    $validation = new Validation();
   
    // Get request data
    $body = $req->body();

    // Valdiate request data
    $errors = $validation
            ->with($body)
            ->rules([
                'name|Name' => 'required|alpha_spaces|max[50]|min[3]',
                'subject|Subject' => 'required|alpha_num_spaces|max[100]|min[3]',
                'email|eMail' => 'valid_email|required|max[150]',
                'message|Message' => 'string|max[500]'
            ])
            ->validate();
    
    // If errors
    if (!empty($errors)) {
        setForm($body);
        setFlashData('errors', $errors);
        return $res->redirect(baseUrl('page/contact#contact-form'));
    }
    
    
    // Send mail
    $mail = new PHPMailer(true);
    try {

        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'info@fanjara.ge';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'mail@fanjara.ge';
        $mail->Password   = 'infoAV12345';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;      

        //Recipients
        $mail->setFrom('info@fanjara.ge', 'fanjara.ge');
        $mail->addAddress('info@fanjara.ge');

        //Content
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $mail->Subject = 'fanjara.ge - ახალი შეტყობინება';
        $mail->Body    = ""
            . "სახელი: {$req->body('name')} <br> "
            . "ელ. ფოსტა: {$req->body('email')} <br> "
            . "თემატიკა: {$req->body('subject')} <br> "
            . "შეტყობინება: {$req->body('message')} <br> ";

        $mail->send();
        
        setFlashData('success', App\Engine\Libraries\Languages::translate([
            'ge' => 'შეტყობინება წარმატებით გაიგზავნა.',
            'en' => 'Message sent successfully.',
            'ru' => 'Сообщение успешно отправлено.'
        ]));
        return $res->redirect(baseUrl('page/contact#contact-form'));
        
    } catch (Exception $e) {
        
        setForm($body);
        
        setFlashData('error', App\Engine\Libraries\Languages::translate([
            'ge' => 'შეტყობინების გაგზავნისას დაფიქსირდა შეცდომა. სცადეთ თავიდან.',
            'en' => 'An error occurred while sending the message. Try again.',
            'ru' => 'При отправке сообщения произошла ошибка. Попробуйте еще раз.'
        ]));
        
        return $res->redirect(baseUrl('page/contact#contact-form'));
    }
});