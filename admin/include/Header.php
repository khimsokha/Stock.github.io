<?php
     if(isset($_SESSION['username']) == false) {

     
?>
<div class="top-header">
        <div class="container-width">
        <div class="logo">
                <img src="img/logo1.jpg" alt="" width="100px" height="100px">
        </div>
        <div class="text">
            <h3>ប្រព័ន្ធគ្រប់គ្រងសម្ភារសម្រាប់ដេប៉ាតឺម៉ង់វិទ្យាសាស្រ្ដកុំព្យូទ័រ</h3>
        </div>

        <div class="profile">
            <p>Profile:</p>
        </div>
        </div>
        
    </div>
    <div class="menu_bar1" id="myHeader">
        <ul>
            <li class="dropdown1_menu"><a href="#">Management</a>
            <div class="dropdown_menu">
                <ul><li><a href="index.php">Dashboard</a></li>
                    <li><a href="userList.php">User list</a></li>
                    <li><a href="#">Profile</a></li>
                    <li><a href="#">Logout</a></li>
                    
                </ul>
            </div>
            </li>
            <li><a href="#">សម្ភារបច្ចេកទេស</a>
            <div class="dropdown_menu">
                <ul>
                    <li><a href="it_thing.php">សម្ភារព័ត៌មានវិទ្យា(60055)</a></li>
                    <li><a href="nonit_thing.php">សម្ភារមិនមែនជាព័ត៌មានវិទ្យា(60051)</a></li>
                    <li><a href="furniture_thing.php">សម្ភារសង្ហារឹម(60052)</a></li>
                    <li><a href="use_thing.php">សម្ភារប្រើប្រាស់(60053)</a></li>
                </ul>
            </div>

           </li>
            <li><a href="">របាយការណ៍</a>
            <div class="dropdown_menu">
            <ul>
                    <li><a href="ListTotal.php">បញ្ជីសម្ភារសរុប</a></li>
                    <li><a href="ListUse.php">បញ្ជីប្រើប្រាស់</a></li>
                    <li><a href="ListBorrow.php">បញ្ជីខ្ចី</a></li>
                    <li><a href="ListInStock.php">បញ្ជីក្នុងឃ្លាំង</a></li>
                    <li><a href="#">បញ្ជីសម្ភារខូច</a></li>
                    
                </ul>
            </div>
            </li>
       <li>
           <a href="#">សកម្មភាព</a>
           <div class="dropdown_menu">
               <ul>
                   <li><a href="06form.php">បញ្ជូលសម្ភារ</a></li>
                   <!-- <li><a href="formUse.php">ដកសម្ភារប្រើ</a></li>
                   <li><a href="formBorrow.php">ខ្ចីសម្ភារ</a></li>
                   <li><a href="09form.php">ស្ថានភាពសម្ភារ</a></li> -->
                   <li><a href="addThink.php">បន្ថែមឯកតា</a></li>
               </ul>
           </div>
       </li>
        </ul>
     
    </div>
    <script>
        window.onscroll = function() {myFunction()};

        var header = document.getElementById("myHeader");
        var sticky = header.offsetTop;

        function myFunction() {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
        }
</script>

<?php } else { ?> 
    <div class="top-header">
        <div class="container-width">
        <div class="logo">
                <img src="img/logo1.jpg" alt="" width="100px" height="100px">
          
        </div>
        <div class="text">
            <h3>ប្រព័ន្ធគ្រប់គ្រងសម្ភារសម្រាប់ដេប៉ាតឺម៉ង់វិទ្យាសាស្រ្ដកុំព្យូទ័រ</h3>
        </div>

        <div class="profile">
            <p>Profile: <?php echo $_SESSION['username'];?></p>
        </div>
        </div>
        
    </div>
    <div class="menu_bar1" id="myHeader">
        <ul>
            <li class="dropdown1_menu"><a href="#">Management</a>
            <div class="dropdown_menu">
                <ul><li><a href="index.php">Dashboard</a></li>
                <?php if($_SESSION["userType"] === 'admin' ){
                    ?>
                    <li><a href="userList.php">User list</a></li>
                <?php } else {}?>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="logout.php">Logout</a></li>
                    
                </ul>
            </div>
            </li>
            <li><a href="#">សម្ភារបច្ចេកទេស</a>
            <div class="dropdown_menu">
                <ul>
                    <li><a href="it_thing.php">សម្ភារព័ត៍មានវិទ្យា(60055)</a></li>
                    <li><a href="nonit_thing.php">សម្ភារមិនមែនជាព័ត៍មានវិទ្យា(60051)</a></li>
                    <li><a href="furniture_thing.php">សម្ភារសង្ហារឹម(60052)</a></li>
                    <li><a href="use_thing.php">សម្ភារប្រើប្រាស់(60053)</a></li>
                </ul>
            </div>

           </li>
            <li><a href="">របាយការណ៍</a>
            <div class="dropdown_menu">
            <ul>
                    <li><a href="ListTotal.php">បញ្ជីសម្ភារសរុប</a></li>
                    <li><a href="ListUse.php">បញ្ជីប្រើប្រាស់</a></li>
                    <li><a href="ListBorrow.php">បញ្ជីខ្ចី</a></li>
                    <li><a href="ListInStock.php">បញ្ជីក្នុងឃ្លាំង</a></li>
                    <li><a href="#">បញ្ជីសម្ភារខូច</a></li>
                    
                </ul>
            </div>
            </li>
       <li>
           <a href="#">សកម្មភាព</a>
           <div class="dropdown_menu">
               <ul>
                   <li><a href="06form.php">បញ្ជូលសម្ភារ</a></li>
                   <!-- <li><a href="formUse.php">ដកសម្ភារប្រើ</a></li>
                   <li><a href="formBorrow.php">ខ្ចីសម្ភារ</a></li>
                   <li><a href="09form.php">ស្ថានភាពសម្ភារ</a></li> -->
                   <li><a href="addThink.php">បន្ថែមឯកតា</a></li>
               </ul>
           </div>
       </li>
        </ul>
        
    </div>
    <script>
window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>

<?php } ?>