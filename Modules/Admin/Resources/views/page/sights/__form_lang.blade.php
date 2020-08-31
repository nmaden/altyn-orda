
<div class="row">
    <div class="col-md-4">
        <input-text name="name" id="name" :model='$model' required  />
    </div>
    <div class="col-md-4">
        <input-text name="address_off" id="address_off" :model='$model->getRelDataObj()'    />
    </div>
    <div class="col-md-4">
        <input-text name="address_legal" id="address_legal" :model='$model->getRelDataObj()'   />
    </div>
    <div class="col-md-12">
        <input-textarea name="about_text" id="about_text" :model='$model->getRelDataObj()'    />
        <input-textarea name="student_life_text" id="student_life_text" :model='$model->getRelDataObj()'   />
        <input-textarea name="note" id="note" :model='$model->getRelDormitory()'    />
    </div>
</div>