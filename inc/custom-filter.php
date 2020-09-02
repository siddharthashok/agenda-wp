<?php

// Returns wp_query instance
function organisation_filter($category=null)
{
    $args=array();
    if($category!=null)
    {
        $args = array(
            "post_type" => "organisations",
            "posts_per_page" => -1,
            "tax_query" => array(
                array(
                    "taxonomy" => "organisation_category",
                    "field" => "slug",
                    "terms" => $category
                )
            )
        );
    }
    else
    {
        $args = array(
            "post_type" => "organisations",
            "posts_per_page" => -1,
        );
    }

    $query = new WP_Query($args);
    $response = array();

    if($query->have_posts())
    {
        while($query->have_posts())
        {
            $query->the_post();
            $temp = array(
                "title" => get_the_title(),
                "id" => get_the_ID(),
                "terms" => get_the_terms(get_the_ID(), "organisation_category"),
                "featured_image" => get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : get_template_directory_uri().'/img/backup.jpg',
                "permalink" => get_the_permalink()
            );
            array_push($response, $temp);
        }
    }
    wp_reset_postdata();

    return $response;
}


function event_filter($category=null, $date=null, $type=null, $availability=null)
{
    $category_args = array();
    $type_args = array();
    $tax_query = array(
        "relation" => 'AND',
    );
    $args = array();

    if($category!=null)
    {
        $category_args = array(
            "taxonomy" => "event_categories",
            "field" => "slug",
            "terms" => $category,
            'operator' => 'IN',
        );
        array_push($tax_query,$category_args);
    }
    
    if($type!=null)
    {
        $type_args = array(
            "taxonomy" => "event_tags",
            "field" => "slug",
            "terms" => $type,
            'operator' => 'IN',
        );
        array_push($tax_query,$type_args);
    }

    if($type!=null || $category !=null)
    {
        $args = array(
            "post_type" => "event_listing",
            "posts_per_page" => -1,
            "post_status" => "publish",
            "tax_query" => $tax_query
        );
    }
    else
    {
        $args = array(
            "post_type" => "event_listing",
            "post_status" => "publish",
            "posts_per_page" => -1,
        );
    }
    

    $query = new WP_Query($args);
    
    $response = array();

    if($query->have_posts())
    {
        while($query->have_posts())
        {
            $query->the_post();
            $start_date = strtotime(get_event_start_date());
            $end_date = strtotime(get_event_end_date());
            $start_time = get_event_start_time();
            $end_time = get_event_end_time();
            $format_date = date("d M",$start_date) . " - " . date("d M",$end_date).", ".$start_time. "-".$end_time;

            $date = strtotime(get_event_start_date());
            $day = date("d",$date);
            $month = date("F", $date);

            $temp = array(
                "title" => get_the_title(),
                "id" => get_the_ID(),
                "featured_image" => get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : get_template_directory_uri().'/img/backup.jpg',
                "permalink" => get_the_permalink(),
                "organiser" => get_field("organizer")->post_title,
                "place" => get_field("place")["address"],
                "dateTime" => $format_date,
                "day" => $day,
                "month" => $month
            );
            array_push($response, $temp);
        }
    }
    wp_reset_postdata();
    return $response;
}