<?php

    function email_sms_follow_up($tries, $email, $review_link, $id) {
        if ($tries == 0) {
            $message = "<p>Hi ".$email."</p>,
            
            <p>We hope you're enjoying your freshly coated floors!</p>
            
            <p>We'd love to hear about your experience with our services. Could you take a moment to share your thoughts by leaving a review? It helps us improve and lets others know about our work.</p>
            
            <p>Leave Your Review <a href='".$review_link."?id=".$id."'>octopro</a></p>
            
            <p>Thank you for choosing us to coat your floors, and we look forward to your feedback!</p>
            
            <p>Warm regards,</p>
            <p>".$email."</p>
            <p>OCTO PRO COATINGS</p>";

            $subject = "Share Your Thoughts on Our Floor Coating!";
        } elseif ($tries == 1) {
            $message = "<p>Hi ".$email.",</p>
            
            <p>Just a friendly reminder! We're eager to hear what you think about our floor coating service. Your review means a lot to us, and it helps us keep doing what we do best.</p>
            
            <p>Leave Your Review <a href='".$review_link."?id=".$id."'>octopro</a></p>
            
            <p>Thanks a million for your time!</p>
            
            <p>Warm regards,</p>
            <p>".$email."</p>
            <p>OCTO PRO COATINGS</p>";

            $subject = "We'd Love to Hear Your Thoughts!";
        } elseif ($tries == 2) {
            $message = "<p>Hi ".$email.",</p>
            
            <p>We hope you're doing well! We're sending one final nudge your way to kindly ask for your review of our floor coating service. Your feedback is incredibly valuable to us.</p>
            
            <p>Share Your Thoughts <a href='".$review_link."?id=".$id."'>octopro</a></p>
            
            <p>Thank you for considering it!</p>
            
            <p>Warm regards,</p>
            <p>".$email."</p>
            <p>OCTO PRO COATINGS</p>";

            $subject = "One Last Request for Your Review!";
        } elseif ($tries == 3) {
            $message = "<p>Hi ".$email.",</p>
            
            <p>We hope you've been enjoying your beautifully coated floors! Your feedback means the world to us, and we'd love to hear about your experience with our services.</p>
            
            <p>Share Your Thoughts <a href='".$review_link."?id=".$id."'>octopro</a></p>
            
            <p>Your review helps us grow and serve you better. We truly appreciate your time and input.</p>
            
            <p>Warm regards,</p>
            <p>".$email."</p>
            <p>OCTO PRO COATINGS</p>";

            $subject = "Your Feedback Matters to Us!";
        } 

        return [$message, $subject];
    }

?>