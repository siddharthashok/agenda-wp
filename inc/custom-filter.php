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
            "category_name" => $category
        );
    }
    else
    {
        $args = array(
            "post_type" => "organisations",
            "posts_per_page" => -1,
            "post_status" => "publish"
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
                "title" => html_entity_decode(get_the_title()),
                "id" => get_the_ID(),
                "terms" => html_entity_decode(get_the_terms(get_the_ID(), "organisation_category")),
                "featured_image" => get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : get_template_directory_uri().'/img/backup.jpg',
                "permalink" => get_the_permalink(),
                "category" => html_entity_decode(get_the_category()[0]->name)
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
    $date_args = array();
    $tag_args = array();
    $tax_query = array(
        "relation" => 'AND',
    );
    $args = array();

    // if($category!=null)
    // {
    //     $category_args = array(
    //         "taxonomy" => "event_categories",
    //         "field" => "slug",
    //         "terms" => $category,
    //         'operator' => 'IN',
    //     );
    //     array_push($tax_query,$category_args);
    // }
    
    // if($type!=null)
    // {
    //     $type_args = array(
    //         "taxonomy" => "event_tags",
    //         "field" => "slug",
    //         "terms" => $type,
    //         'operator' => 'IN',
    //     );
    //     array_push($tax_query,$type_args);
    // }

    if($availability!=null)
    {
        $availability_args = array(
            "taxonomy" => "availability",
            "field" => "slug",
            "terms" => $availability,
            'operator' => 'IN',
        );
        array_push($tax_query,$availability_args);
    }

    if($date !=null)
    {
        $date_args = array(
            'relation' => 'OR',
            array(
                'key' => 'start_date',
                'value' => array($date[0], $date[1]),
                'compare' => 'BETWEEN',
                'type' => 'DATE'
            )
        );
    }
    else
    {
        $date_args = array(
            array(
                'key' => 'start_date',
                'value' => date("Y-m-d"),
                'compare' => '>=',
                'type' => 'DATE'
            )
        );
    }

    if($type!=null || $category !=null || $availability !=null || $date !=null )
    {
        $args = array(
            "post_type" => "event",
            "posts_per_page" => -1,
            "post_status" => "publish",
            "category_name" => $category,
            "tag" => $type,
            "tax_query" => $tax_query,
            "meta_query" => $date_args
        );
    }
    else
    {
        $args = array(
            "post_type" => "event",
            "post_status" => "publish",
            "posts_per_page" => -1,
            'meta_key' => 'start_date',
            'orderby' => array( 'meta_value' => 'ASC' ),
            "meta_query" => $date_args
        );
    }
    

    $query = new WP_Query($args);
    
    $response = array();

    if($query->have_posts())
    {
        while($query->have_posts())
        {
            $query->the_post();
            $start_date = strtotime(get_field("start_date"));
            $end_date = strtotime(get_field("end_date_time"));
            $start_time = date("G.i",$start_date);
            $end_time = date("G.i",$end_date);
            $format_date = date("d M",$start_date) . " - " . date("d M",$end_date).", kl ".$start_time. "-".$end_time;
            $tags= get_the_tags();

            $cost_of_event = ture;

            if(get_field("cost_of_event")>0)
            {
                $cost_of_event = false;
            }

            $day = date("d",$start_date);
            $month = date("F", $start_date);
            $temp_organiser = "";

          
            if(!empty(get_field("organizer")->post_title))
            {
        
                $temp_organiser = get_field("organizer")->post_title;
        
            }
            if(!empty(get_field("other_organizers")))
            {
        
                $temp_organiser = !empty(get_field("organizer")->post_title)? $temp_organiser." ,".get_field("other_organizers"): get_field("other_organizers");
        
            }
            
            $temp = array(
                "title" => html_entity_decode(get_the_title()),
                "id" => get_the_ID(),
                "featured_image" => get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : get_template_directory_uri().'/img/backup.jpg',
                "permalink" => get_the_permalink(),
                "organiser" => $temp_organiser,
                "place" => html_entity_decode(get_field("address")),
                "dateTime" => $format_date,
                "day" => $day,
                "month" => $month,
                "tags" => $tags!=false ? $tags : array(),
                "cost_of_event"=>$cost_of_event
            );
            array_push($response, $temp);
        }
    }
    wp_reset_postdata();
    return $response;
}