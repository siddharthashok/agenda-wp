<?php

function createOrganisation()
{
    $name_organisation = sanitize_text_field($_POST["organisationName"]);
    $website_url = sanitize_text_field($_POST["websiteURL"]);
    $email_address = sanitize_text_field($_POST["emailAddress"]);
    $link_to_social_media = sanitize_text_field($_POST["socialMedia"]);
    $city = sanitize_text_field($_POST["city"]);
    $whoAreYou = sanitize_textarea_field($_POST["whoAreYou"]);
    $orgGoals = sanitize_textarea_field($_POST["orgGoals"]);
    $orgBusiness = sanitize_textarea_field($_POST["orgBusiness"]);
    $orgContribute = sanitize_textarea_field($_POST["orgContribute"]);
    // $event_concerns = $_POST["eventConcerns"];
    $contact_name = sanitize_text_field($_POST["contactName"]);
    $contact_email_address = sanitize_text_field($_POST["contactEmail"]);
    $contact_phone = sanitize_text_field($_POST["contactPhone"]);
    // $corporate = sanitize_text_field($_POST["corporate"]);
    $message = sanitize_textarea_field($_POST["message"]);
    $issues = $_POST["issues"];

    $post_id = wp_insert_post( 
        array(
            "post_title" => $name_organisation,
            "post_status" => "draft",
            "post_type" => "organisations",
            "post_content" => $whoAreYou,
        )
    );

    //Select category
    wp_set_post_categories($post_id,$issues,false);
    // Update Post
    if(isset($_FILES["file"])){
        $file = $_FILES["file"];
        $uploaded_file=wp_upload_bits($file["name"], null, file_get_contents($file["tmp_name"]));
        if (!$uploaded_file['error']) {
            $filename = $file["name"];
            $wp_filetype = wp_check_filetype($filename, null );
            $attachment = array(
                'post_mime_type' => $wp_filetype['type'],
                // 'post_parent' => $parent_post_id,
                'post_title' => preg_replace('/\.[^.]+$/', '', $filename),
                'post_content' => '',
                // 'post_status' => 'inherit'
            );
            $attachment_id = wp_insert_attachment( $attachment, $uploaded_file['file'], $parent_post_id );
            if (!is_wp_error($attachment_id)) {
                require_once(ABSPATH . "wp-admin" . '/includes/image.php');
                $attachment_data = wp_generate_attachment_metadata( $attachment_id, $uploaded_file['file'] );
                wp_update_attachment_metadata( $attachment_id,  $attachment_data );
                set_post_thumbnail( $post_id, $attachment_id );
            }
        }
    }
    // Update ACF
    $value = array(
        "website" => $website_url,
        "instagram" => $link_to_social_media,
        "facebook" => $link_to_social_media,
        "mail" => $email_address
    );
    update_field("contact_details",$value,$post_id);
    update_field("city",$city,$post_id);

    update_field("who_are_you",$whoAreYou,$post_id);
    update_field("org_goals",$orgGoals,$post_id);
    update_field("org_business",$orgBusiness,$post_id);
    update_field("org_contribute",$orgContribute,$post_id);

    $other_details = array(
        "contact_name" => $contact_name,
        "contact_email_address" => $contact_email_address,
        "contact_phone_number" => $contact_phone,
        "message" => $message
    );
    update_field("other_details",$other_details,$post_id);
    // update_field("website",$website_url,$post_id);
    // update_field("instag",$instagram,$post_id);
    // update_field("facebook",$link_to_social_media,$post_id);
    // update_field("mail",$email_address,$post_id);
    $to = "org@agendajamlikhet.se";
    $headers = array('Content-Type: text/html; charset=UTF-8');
    $subject = "New Event Application";
    wp_mail( $to, $subject, "New organisation has been registered", $headers );
    
    echo json_encode(array("pageId" => $post_id));
    wp_die();
}

add_action("wp_ajax_createOrganisation", "createOrganisation");
add_action("wp_ajax_nopriv_createOrganisation", "createOrganisation");

function createEvent()
{
    $event_title = sanitize_text_field($_POST["eventTitle"]);
    $organizer = sanitize_textarea_field($_POST["organizer"]);
    $event_date = $_POST["eventDatepicker"];
    $event_time = $_POST["eventTimepicker"];
    $location = sanitize_text_field($_POST["eventLocation"]);
    $address = sanitize_text_field($_POST["address"]);
    $availability = $_POST["availability"];
    $other_availibility = sanitize_text_field($_POST["otherAvailibility"]);
    $type = $_POST["type"];
    $concerns = $_POST["concerns"];
    $other_type = sanitize_text_field($_POST["otherType"]);
    $event_cost = sanitize_text_field($_POST["eventCost"]);
    $website_url = sanitize_text_field($_POST["websiteURL"]);
    $facebook_link = sanitize_text_field($_POST["facebookLink"]);
    $link_organiser_website = sanitize_text_field($_POST["linkOrganiserWebsite"]);
    $event_description = sanitize_text_field($_POST["eventDescription"]);
    $contact_name = sanitize_text_field($_POST["contactName"]);
    $contact_email_address = sanitize_text_field($_POST["contactEmailAddress"]);
    $contact_phone_no = sanitize_text_field($_POST["contactPhoneNo"]);
    $message = sanitize_textarea_field($_POST["message"]);

    
    $post_id = wp_insert_post( 
        array(
            "post_title" => $event_title,
            "post_status" => "draft",
            "post_type" => "event",
            "post_content" => $event_description,
        )
    );
    
    if(isset($_FILES["eventBanner"])){
        $file = $_FILES["eventBanner"];
        $uploaded_file=wp_upload_bits($file["name"], null, file_get_contents($file["tmp_name"]));
        if (!$uploaded_file['error']) {
            $filename = $file["name"];
            $wp_filetype = wp_check_filetype($filename, null );
            $attachment = array(
                'post_mime_type' => $wp_filetype['type'],
                // 'post_parent' => $parent_post_id,
                'post_title' => preg_replace('/\.[^.]+$/', '', $filename),
                'post_content' => '',
                // 'post_status' => 'inherit'
            );
            $attachment_id = wp_insert_attachment( $attachment, $uploaded_file['file'], $parent_post_id );
            if (!is_wp_error($attachment_id)) {
                require_once(ABSPATH . "wp-admin" . '/includes/image.php');
                $attachment_data = wp_generate_attachment_metadata( $attachment_id, $uploaded_file['file'] );
                wp_update_attachment_metadata( $attachment_id,  $attachment_data );
                set_post_thumbnail( $post_id, $attachment_id );
                // update_post_meta($post_id, "_event_banner", wp_get_attachment_url( $attachment_id ));
            }
        }
    }

    if(isset($_FILES["logo"])){
        $file = $_FILES["logo"];
        $uploaded_file=wp_upload_bits($file["name"], null, file_get_contents($file["tmp_name"]));
        if (!$uploaded_file['error']) {
            $filename = $file["name"];
            $wp_filetype = wp_check_filetype($filename, null );
            $attachment = array(
                'post_mime_type' => $wp_filetype['type'],
                // 'post_parent' => $parent_post_id,
                'post_title' => preg_replace('/\.[^.]+$/', '', $filename),
                'post_content' => '',
                // 'post_status' => 'inherit'
            );
            $attachment_id = wp_insert_attachment( $attachment, $uploaded_file['file'], $parent_post_id );
            if (!is_wp_error($attachment_id)) {
                require_once(ABSPATH . "wp-admin" . '/includes/image.php');
                $attachment_data = wp_generate_attachment_metadata( $attachment_id, $uploaded_file['file'] );
                wp_update_attachment_metadata( $attachment_id,  $attachment_data );
                // set_post_thumbnail( $post_id, $attachment_id );
                update_field("logo", $attachment_id ,$post_id);
            }
        }
    }

    
    update_field("organizer_name",$organizer,$post_id);
    update_field("venue_for_event",$location,$post_id);
    update_field("start_date",$event_date.' '.$event_time,$post_id);
    update_field("cost_of_event",$event_cost,$post_id);
    update_field("address",$address,$post_id);
    update_field("other_availibility",$other_availibility,$post_id);
    
    update_field("website_for_event",$website_url,$post_id);
    update_field("link_to_facebook_event",$facebook_link,$post_id);
    update_field("link_to_organisers_website",$link_organiser_website,$post_id);
    update_field("name_of_contact_person",$contact_name,$post_id);
    update_field("email_address_of_contact_person",$contact_email_address,$post_id);
    update_field("telephone_number_of_contact_person",$contact_phone_no,$post_id);
    
    update_field("contact_details_for_event",$contact_details,$post_id);
    update_field("message",$message,$post_id);
    

    // $availabilityList = array();
    // for($i=0; $i<sizeof($availability); $i++)
    // {
    //     $temp = array("title" => $availability[$i]);
    //     array_push($availabilityList,$temp);
    // }
    wp_set_post_tags($post_id,$type,false);
    // update_field("availability", $availabilityList, $post_id);
    wp_set_post_categories($post_id,$concerns,false);

    wp_set_post_terms( $post_id, $availability, "availability", false );

    $to = "events@agendajamlikhet.se";
    $headers = array('Content-Type: text/html; charset=UTF-8');
    $subject = "New Event Application";
    wp_mail( $to, $subject, "New event has been registered", $headers );

    echo json_encode(array("pageId" => $post_id));
    wp_die();
}
add_action("wp_ajax_createEvent", "createEvent");
add_action("wp_ajax_nopriv_createEvent", "createEvent");


function createAttachment($file)
{
    $uploaded_file=wp_upload_bits($file["name"], null, file_get_contents($file["tmp_name"]));
    if (!$uploaded_file['error']) {
        $filename = $file["name"];
        $wp_filetype = wp_check_filetype($filename, null );
        $attachment = array(
            'post_mime_type' => $wp_filetype['type'],
            // 'post_parent' => $parent_post_id,
            'post_title' => preg_replace('/\.[^.]+$/', '', $filename),
            'post_content' => '',
            // 'post_status' => 'inherit'
        );
        $attachment_id = wp_insert_attachment( $attachment, $uploaded_file['file'], $parent_post_id );
        if (!is_wp_error($attachment_id)) {
            require_once(ABSPATH . "wp-admin" . '/includes/image.php');
            $attachment_data = wp_generate_attachment_metadata( $attachment_id, $uploaded_file['file'] );
            wp_update_attachment_metadata( $attachment_id,  $attachment_data );
        }
    }

    return $attachment_id;
}

function filter_organisation()
{
    $category = $_POST["category"];

    $response = organisation_filter($category);

    http_response_code(200);
    echo json_encode($response);
    die();
}

add_action("wp_ajax_filter_organisation", "filter_organisation");
add_action("wp_ajax_nopriv_filter_organisation", "filter_organisation");

function filter_events()
{
    $category = $_POST["category"];
    // $date_from = $_POST["date_from"];
    // $date_to = $_POST["date_to"];
    $date = $_POST["date"];
    $type = $_POST["type"];
    $availability = $_POST["availability"];

    $response = event_filter($category,$date,$type,$availability);
    http_response_code(200);
    echo json_encode($response);
    die();
}

add_action("wp_ajax_filter_events", "filter_events");
add_action("wp_ajax_nopriv_filter_events", "filter_events");

function volunteer()
{
    $group= $_POST["group"];
    $city=$_POST["city"];
    $fullName=$_POST["fullName"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $about=$_POST["about"];
    $suggestion=$_POST["suggestion"];
    $whichCity=$_POST["whichCity"];
    $engageSuggestion=$_POST["engageSuggestion"];

    $groupText = implode(", ", $group);
    $message = "<div>
    Jag är intresserad att bli volontär för en eller flera grupper av följande : $groupText 
    </div>
    <div>
        Jag vill starta Agenda: Jämlikhet i min stad, ange stad: $city
    </div>
    <div>
        Namn: $fullName
    </div>
    <div>
        E-mail: $email 
    </div>
    <div>
        Mobilnummer: $phone
    </div>
    <div>
        Berätta om dig själv och varför du vill engagera dig i Agenda: Jämlikhet!: $about
    </div>
    <div>
        Är det något speciellt som du är nyfiken på eller vill bidra med i den grupp som du är intresserad av?: $suggestion
    </div>
    <div>
        I vilken stad befinner du dig?: $whichCity
    </div>
    <div>
        Har du idéer om hur vi kan engagera fler för jämlikhet? Berätta gärna för oss här!: $engageSuggestion
    </div>
    ";
    $to = "info@agendajamlikhet.se";
    $headers = array('Content-Type: text/html; charset=UTF-8');
    $subject = "New Volunteer Application";
    wp_mail( $to, $subject, $message, $headers );

    http_response_code(200);
    echo json_encode(array("message"=>"success"));
    die();
}
add_action("wp_ajax_volunteer", "volunteer");
add_action("wp_ajax_nopriv_volunteer", "volunteer");

function member()
{
    
    $fullName=$_POST["fullName"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $residence=$_POST["residence"];
    

    $message = "
    <div>
        Namn: $fullName
    </div>
    <div>
        E-mail: $email 
    </div>
    <div>
        Mobilnummer: $phone
    </div>
    <div>
        Bostadsort: $residence
    </div>
    ";
    $to = "info@agendajamlikhet.se";
    $headers = array('Content-Type: text/html; charset=UTF-8');
    $subject = "New Member Application";
    wp_mail( $to, $subject, $message, $headers );

    http_response_code(200);
    echo json_encode(array("message"=>"success"));
    die();
}
add_action("wp_ajax_member", "member");
add_action("wp_ajax_nopriv_member", "member");