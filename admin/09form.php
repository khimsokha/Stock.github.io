<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ខូច</title>
    <link rel="stylesheet" href="style/09form.css">
    <link rel="icon" href="img/logo.png">
</head>
<body>
<div class="box">
        <div class="form">
            <h2>ស្ថានភាពសម្ភារ</h2>
            <form action="POST"​>
                <div class="control-form">
                    <div class="inline-form">
                            <label for="">ឈ្មោះសម្ភារ:</label>
                            <input type="text" name="Name" placeholder="ឈ្មោះសម្ភារ:">
                    </div>
                    <div class="inline-form">
                        <label for="">អនុគណនី</label>
                        <input list="title"> <br>
                        <datalist  id="title">
                            <option > 60055</option>
                            <option >60051</option>
                            <option > 60053</option>
                            <option >60052</option>
                            
                        </datalist>
                    </div>
                    <div class="inline-form">
                            <label for="">ឯកតា</label>
                            <input list="text"> <br>
                            <datalist  id="text">
                                <option > ឯកតា</option>
                                <option >រាយ</option>
                                <option >គ្រឿង</option>
                                <option >ប្រអប់</option>
                                <option >កេស</option>
                                
                            </datalist>
                    </div>
                    <div class="inline-form">
                            <label for="">បរិមាណ</label> 
                            <input type="text" name="Quantity" placeholder="បរិមាណ">
                    </div>
                    <div class="inline-form">
                            <label for="">ស្ថានភាព</label>
                            <input list="dbtext"> <br>
                            <datalist  id="dbtext">
                                <option >ល្អ</option>
                                <option >មធ្យម</option>
                                <option >អន់</option>
                                <option >ខូច</option>
                            </datalist>
                    </div>
                    <div class="inline-form">
                            <label for="" > កាលបរិច្ចេទចូល</label>
                            <input type="date" name="date" id="" >
                    </div>
                    
                    <div class="clear-fix"></div>
                    <div class="inline-form">
                            <label for="">រូបភាព</label>
                            <input type="file" name="Pictur" placeholder="រូបភាព">
                    </div>
                    <div class="clear-fix"></div>
                    <div class="button">
                            <!-- <input type="submit" name="submit" value="យល់ព្រម">
                            <input type="reset" name="reset" id="" value="បដិសេដ"> -->
                           
                            <button class="left" type="reset">បដិសេដ</button>
                            <button class="right" type="submit" name="save">យល់ព្រម</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>