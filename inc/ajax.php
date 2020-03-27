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
    // update_field("website",$website_url,$post_id);
    // update_field("instag",$instagram,$post_id);
    // update_field("facebook",$link_to_social_media,$post_id);
    // update_field("mail",$email_address,$post_id);

    echo json_encode(array("pageId" => $post_id));
    wp_die();
}

add_action("wp_ajax_createOrganisation", "createOrganisation");
add_action("wp_ajax_nopriv_createOrganisation", "createOrganisation");