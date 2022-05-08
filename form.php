<style>
#content, header div{
    background-color: MediumAquamarine;
    max-width: 960px;
    margin: 0 auto;
}
body{
    font-family: "Montserrat", sans-serif;
}
div.table ,#form, div.link-list{
    background-color: YellowGreen;
}
label {
    margin:10px 0;
}
input[type=text] {
  padding:10px;
  margin:10px 0;
  border:1;
    border-radius:15px;
  box-shadow:0 0 15px 4px rgba(0,0,0,0.06);
}
input[type=email] {
  padding:10px;
  margin:10px 0;
  border:1;
    border-radius:15px;
  box-shadow:0 0 15px 4px rgba(0,0,0,0.06);
}
select {
  padding:10px;
  border-radius:10px;
}
textarea {
  resize: vertical;
  padding:15px;
  margin:10px 0;
  border-radius:15px;
  border:1;
  box-shadow:4px 4px 10px rgba(0,0,0,0.06);
  height:150px;
}
.error {
    border: 3px solid red;
  }
.button {
  font: bold 11px Arial;
  text-decoration: none;
  background-color: #EEEEEE;
  color: #EE82EE;
  padding: 2px 6px 2px 6px;
  border-top: 1px solid #CCCCCC;
  border-right: 1px solid #333333;
  border-bottom: 1px solid #333333;
  border-left: 1px solid #CCCCCC;
}
</style>
<?php
if (!empty($messages)) {
  print('<div id="messages">');
  // Выводим все сообщения.
  foreach ($messages as $message) {
    print($message);
  }
  print('</div>');
}
?>
<body>
   <div id="form">
    <h1>Форма контракта</h1>

    <form action="ind.php" method="POST">

      <label>
        Имя:<br />
        <input type="text" name="field-name" placeholder="Name" <?php if ($errors['field-name']) {print 'class="error"';} ?>
          value="<?php print $values['field-name']; ?>" />
      </label><br />

      <label>
        Еmail:<br />
        <input name="field-email" type="email" placeholder="Email"
          value="<?php print $values['field-email']; ?>"
	<?php if ($errors['field-email']) {print 'class="error"';} ?>
	/>
      </label><br />

      <label>
        Год рождения:<br />
        <select name="year" <?php if ($errors['year']) {print 'class="error"';} ?>> 
	  <option value="Год">Год рождения</option>
           <?php
             for($i=1890;$i<=2022;$i++){
             if($values['year']==$i){
             printf("<option value=%d selected>%d </option>",$i,$i);
              }
             else{
             printf("<option value=%d>%d </option>",$i,$i);
            }
          }
          ?>
         </select>
      </label><br />
	  
	  Пол:<br />
     <div <?php if ($errors['radio-pol']) {print 'class="error"';} ?>>
      <label> <input type="radio" name="radio-pol" value="man" 
	<?php if($values['radio-pol']=="man") {print 'checked';} ?> />
        Мужской </label>
      <label><input type="radio" name="radio-pol" value="woman" 
	<?php if($values['radio-pol']=="woman") {print 'checked';} ?> />
        Женский</label><br />
     </div>
		
	  Количество конечностей:<br />
     <div <?php if ($errors['radio-limb']) {print 'class="error"';} ?>>
      <label><input type="radio" name="radio-limb" value="1" 
	<?php if($values['radio-limb']=="1") {print 'checked';} ?> />
        1</label>
      <label><input type="radio"name="radio-limb" value="2" 
	<?php if($values['radio-limb']=="2") {print 'checked';} ?> />
        2</label>
      <label><input type="radio" name="radio-limb" value="3" 
	<?php if($values['radio-limb']=="3") {print 'checked';} ?> />
        3</label>
      <label><input type="radio" name="radio-limb" value="4" 
	<?php if($values['radio-limb']=="4") {print 'checked';} ?> />
        4</label><br />
      </div>
		
	  <label>
        Сверхспособности:
        <br />
        <select name="field-super[]" multiple="multiple"
	  <?php if ($errors['field-super']) {print 'class="error"';} ?> >
          <option value="immortal" <?php if($values['immortal']==1){print 'selected';} ?> > Бессмертие</option>
          <option value="noclip" <?php if ($values['noclip']==1){print 'selected';} ?> > No clip</option>
          <option value="power" <?php if ($values['power']==1){print 'selected';} ?> > Суперсила</option>
	  <option value="telepat" <?php if ($values['telepat']==1){print 'selected';} ?> > Телепатия</option>
        </select>
      </label><br />
	  
      <label>
        Биография:<br />
        <textarea name="field-bio"> <?php print $values['field-bio']; ?> </textarea>
      </label><br />
      <input name='dd' hidden value=<?php print($_GET['edit_id']);?>>
      <input type="submit" name='edit' value="Edit"/>
      <input type="submit" name='del' value="Delete"/>

      Если уверенны в своем ответе нажимайте:
      <input type="submit" value="Send" />
    </form>
   <p>
    <a href='admin.php' class="button">Назад</a>
    </p>
   </div>
</body>
