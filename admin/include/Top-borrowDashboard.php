<?php
 include('config.php');
?>

<div class="top_dashboard">
            <div class="do">
            <table style=" float:right; font-family:'Time New Roman', khmer os battambang; line-height: 10px; font-size:88%;">
                    <tr>
                    <th style="padding: 15px;" bgcolor="green10">ចំនួនអ្នកកំពុងខ្ចី</th>
                    <th style="padding: 15px;" bgcolor="#ffabaf">ប្រវត្តិការខ្ចី</th>
                    </tr>
                    <tr>
                        <td style="padding: 10px; text-align:center;"  bgcolor="#b8e6bf"><?php echo $connect->query("SELECT * FROM `listborrow` WHERE STATUS = 1")->num_rows;?> នាក់</td>
                        <td style="padding: 10px;" bgcolor="#facfd2"><a href="ListBorrowHistory.php" id="open">👉ចុច</a></td>
                    </tr>
                </table>
                
                <!-- <a href="06form.php"> <input type="button" name="Add"></a> -->
            </div>
            
            <!-- <div class="search-and-title">
                <h3></h3>
                <div class="search-control">
                    <form action="">
                    <input type="search" name="search"  placeholder="search" color="black">
                    <button type = "submit" name = "search-button">Search</button>
                    </form>
                </div>
            </div> -->
        </div>