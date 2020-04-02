<?php

function createOrganisation()
{
    $name_organisation = $_POST["organisationName"];
    $website_url = $_POST["websiteURL"];
    $email_address = $_POST["emailAddress"];
    $link_to_social_media = $_POST["socialMedia"];
    $city = $_POST["city"];
    $description = $_POST["description"];
    // $event_concerns = $_POST["eventConcerns"];
    $contact_name = $_POST["contactName"];
    $contact_email_address = $_POST["contactEmail"];
    $contact_phone = $_POST["contactPhone"];
    $corporate = $_POST["corporate"];
    $message = $_POST["message"];

    $post_id = wp_insert_post( 
        array(
            "post_title" => $name_organisation,
            "post_status" => "draft",
            "post_type" => "organisations",
            "post_content" => $description,
        )
    );

    // Update Post

    // Update ACF
    $value = array(
        "website" => $website_url,
        "instagram" => "",
        "facebook" => $link_to_social_media,
        "mail" => $email_address
    );
    update_field("contact_details",$value,$post_id);
    update_field("city",$city,$post_id);

    $other_details = array(
        "contact_name" => $contact_name,
        "contact_email_address" => $contact_email_address,
        "contact_phone_number" => $contact_phone,
        "number" => $corporate,
        "message" => $message
    );
    update_field("other_details",$other_details,$post_id);
    // update_field("website",$website_url,$post_id);
    // update_field("instag",$instagram,$post_id);
    // update_field("facebook",$link_to_social_media,$post_id);
    // update_field("mail",$email_address,$post_id);

    echo json_encode(array("pageId" => $post_id));
    wp_die();
}

add_action("wp_ajax_createOrganisation", "createOrganisation");
add_action("wp_ajax_nopriv_createOrganisation", "createOrganisation");

function createEvent()
{
    $event_title = $_POST["eventTitle"];
    $organizer = $_POST["organizer"];
    $event_date = $_POST["eventDatepicker"];
    $event_time = $_POST["eventTimepicker"];
    $location = $_POST["eventLocation"];
    $address = $_POST["address"];
    $availability = $_POST["availability"];
    $event_cost = $_POST["eventCost"];
    $website_url = $_POST["websiteURL"];
    $facebook_link = $_POST["facebookLink"];
    $link_organiser_website = $_POST["linkOrganiserWebsite"];
    $event_description = $_POST["eventDescription"];
    $contact_name = $_POST["contactName"];
    $contact_email_address = $_POST["contactEmailAddress"];
    $contact_phone_no = $_POST["contactPhoneNo"];
    $message = $_POST["message"];

    
    $post_id = wp_insert_post( 
        array(
            "post_title" => $event_title,
            "post_status" => "draft",
            "post_type" => "event_listing",
            "post_content" => $event_description,
        )
    );

    update_post_meta($post_id, "_event_venue_name", $location);
    update_post_meta($post_id, "_event_start_date", $event_date);
    update_post_meta($post_id, "_event_start_time", $event_time);
    update_post_meta($post_id, "_evet_cost", $event_cost);
    update_post_meta($post_id, "_evet_cost", $event_cost);
    
    update_field("address",$address,$post_id);
    update_field("address",$address,$post_id);
    update_field("place",array("address"=>$location),$post_id);

    $contact_details = array(
        "name"=> $contact_name,
        "email"=> $contact_email_address,
        "phone"=> $contact_phone_no
    );

    update_field("contact_details_for_event",$contact_details,$post_id);
    update_field("message",$message,$post_id);
    update_field("rsvp_link",$website_url,$post_id);

    $availabilityList = array();

    for($i=0; $i<sizeof($availability); $i++)
    {
        $temp = array("title" => $availability[$i]);
        array_push($availabilityList,$temp);
    }

    update_field("availability", $availabilityList, $post_id);


    echo json_encode(array("pageId" => $post_id));
    wp_die();
}
add_action("wp_ajax_createEvent", "createEvent");
add_action("wp_ajax_nopriv_createEvent", "createEvent");