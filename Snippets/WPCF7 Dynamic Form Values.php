add_action("wpcf7_before_send_mail", "wpcf7_do_something");

function wpcf7_do_something($WPCF7_ContactForm)
{

    if (224 == $WPCF7_ContactForm->id()) {

        //Get current form
        $wpcf7      = WPCF7_ContactForm::get_current();

        // get current SUBMISSION instance
        $submission = WPCF7_Submission::get_instance();

        // Ok go forward
        if ($submission) {

            // get submission data
            $data = $submission->get_posted_data();

            // nothing's here... do nothing...
            if (empty($data))
                return;

            // extract posted data for example to get name and change it
            $name         = isset($data['your-name']) ? $data['your-name'] : "";

            // do some replacements in the cf7 email body
            $mail         = $wpcf7->prop('mail');

            // Find/replace the "[your-name]" tag as defined in your CF7 email body
            // and add changes name
            $mail['body'] = str_replace('[your-name]', $name . '-tester', $mail['body']);

            // Save the email body
            $wpcf7->set_properties(array(
                "mail" => $mail
            ));

            // return current cf7 instance
            return $wpcf7;
        }
    }
}
