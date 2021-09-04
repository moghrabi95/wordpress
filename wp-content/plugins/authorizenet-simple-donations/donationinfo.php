<?php
function donation_meta_box_callback($post)
{

?>

<style> 
table>thead {
    vertical-align: bottom;
    
}
tbody, td, tfoot, th, thead, tr {
    border-color: inherit;
    border-style: solid;
}
table {
    --bs-table-bg: transparent;
    --bs-table-accent-bg: transparent;
    --bs-table-striped-color: #212529;
    --bs-table-striped-bg: rgba(0, 0, 0, 0.05);
    --bs-table-active-color: #212529;
    --bs-table-active-bg: rgba(0, 0, 0, 0.1);
    --bs-table-hover-color: #212529;
    --bs-table-hover-bg: rgba(0, 0, 0, 0.075);
    width: 100%;
    margin-bottom: 1rem;
    color: #212529;
    vertical-align: top;
    /* border-color: #dee2e6; */
}
table {
    caption-side: bottom;
    border-collapse: collapse;
}

table>:not(:last-child)>:last-child>* {
    border-bottom-color: currentColor;
}
table>:not(caption)>*>* {
    padding: .5rem .5rem;
    background-color: var(--bs-table-bg);
    border-bottom-width: 1px;
    box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
}
th {
    text-align: inherit;
    text-align: -webkit-match-parent;
}
table>:not(caption)>*>* {
    padding: .5rem .5rem;
    background-color: var(--bs-table-bg);
    border-bottom-width: 1px;
    box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
}

</style>
   <div class="">
                    <div class="">
                        <div class="">
                            <table>
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Amount (USD)</th>
                                    <th>Transaction ID</th>
                                    <th>last 4</th>
                                    <th>ApprovalCode</th>
                                    <th>Project name</th>
                                    <th>Project Id</th>
                                    <th>Project amount</th>
                                    <th id ="subscribtion">subscribtion</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                         <td><span class="nd_options_color_greydark nd_donations_float_left nd_options_first_font nd_donations_font_size_15 nd_donations_margin_left_20"><strong><?php echo esc_attr(get_post_meta( $post->ID, 'donor_firstname', true ));?>  <?php echo esc_attr(get_post_meta( $post->ID, 'donor_lastname', true ));?></strong></span></td>
                                         <td><span class="nd_options_color_greydark nd_donations_float_left nd_options_first_font nd_donations_font_size_15 nd_donations_margin_left_20"><strong><?php echo esc_attr(get_post_meta( $post->ID, 'donor_email', true ));?></strong></span></td>
                                         <td><span class="nd_options_color_greydark nd_donations_float_left nd_options_first_font nd_donations_font_size_15 nd_donations_margin_left_20"><strong><?php echo esc_attr(get_post_meta( $post->ID, 'donation_amount', true ));?></strong></span></td>
                                         <td><span class="nd_options_color_greydark nd_donations_float_left nd_options_first_font nd_donations_font_size_15 nd_donations_margin_left_20"><strong><?php echo esc_attr(get_post_meta( $post->ID, 'transaction_id', true ));?></strong></span></td>
                                         <td><span class="nd_options_color_greydark nd_donations_float_left nd_options_first_font nd_donations_font_size_15 nd_donations_margin_left_20"><strong><?php echo esc_attr(get_post_meta( $post->ID, 'last_4', true ));?></strong></span></td>
                                         <td><span class="nd_options_color_greydark nd_donations_float_left nd_options_first_font nd_donations_font_size_15 nd_donations_margin_left_20"><strong><?php echo esc_attr(get_post_meta( $post->ID, 'approval_code', true ));?></strong></span></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <?php
                                            if (esc_attr(get_post_meta( $post->ID, 'subscribtion', true ))) {
                                                echo "  <td colspan='4'><span class='nd_options_color_greydark nd_donations_float_left nd_options_first_font nd_donations_font_size_15 nd_donations_margin_left_20'><strong>yes</strong></span></td>";
                                            }else {
                                                echo "  <td headers='subscribtion'><span class='nd_options_color_greydark nd_donations_float_left nd_options_first_font nd_donations_font_size_15 nd_donations_margin_left_20'><strong>NO</strong></span></td>";
                                            }
                                        ?>
                                        <?php
                                        foreach(get_post_meta($post->ID, 'projects', true) as $project){ ?>
                                         <tr>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                             <?php
                                            echo "  <td><span class='nd_options_color_greydark nd_donations_float_left nd_options_first_font nd_donations_font_size_15 nd_donations_margin_left_20'><strong>'" . esc_attr($project["project_name"]) . "'</strong></span></td>";
                                            echo "  <td><span class='nd_options_color_greydark nd_donations_float_left nd_options_first_font nd_donations_font_size_15 nd_donations_margin_left_20'><strong>'" . esc_attr($project["project_id"]) . "'</strong></span></td>";
                                            echo "  <td><span class='nd_options_color_greydark nd_donations_float_left nd_options_first_font nd_donations_font_size_15 nd_donations_margin_left_20'><strong>'" .  esc_attr($project["amount"]) . "'</strong></span></td>";
                                            ?>
                                        </tr>
                                            <?php
                                        }
                                        ?>
                                    
                                                                  
                                       
                                        
                                    </tr>
                                    
                            </tbody></table>
                        </div>
                        <div class="nd_donations_width_50_percentage nd_donations_width_100_percentage_responsive nd_donations_float_left nd_donations_text_align_right nd_donations_text_align_left_responsive">
                            <h5 class="nd_donations_padding_18_0 nd_options_color_grey nd_options_second_font"></h5>
                        </div>
                    </div>
    </div>
<?php  

}
?>
