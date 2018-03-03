<?php
echo $javascript->link('jquery.validate');
echo $this->element('teacher_menu');
?>
<script type="text/javascript">
    $(function () {
        $('#TeacherUpload').validate({errorClass: "error-message", errorElement: "div",
            submitHandler: function (form) {
                if ($('.status').val() == "1")
                {
                    answer = confirm("The video is selected but didn't start uploading, to start upload click on 'Start Upload', Do you want to cancel upload and proceed ?");
                    if (answer != 0)
                        form.submit();
                    return false;
                }
                if ($('.status').val() == "2")
                {
                    answer = confirm("The video isn't finished uploading, Do you want to cancel upload and proceed ?");
                    if (answer != 0)
                        form.submit();
                    return false;
                }
                form.submit();
            }
        });
    });
</script>

<div class="col-md-9 col-sm-9 content">
    <div class="sb sb_shadow">
        <div class="box_content">
            <div class="comment-form">

                <?php
                $prefix = $this->params['prefix'];

                $url = '/' . $prefix . "/study_resources/assign/$student_id";
                ?>
                <h1><?php echo __('Assign new resource for Student') ?> "<?php echo $student['Student']['first_name'] . ' ' . $student['Student']['last_name'] ?>"</h1>

                <?php
                echo $form->create('StudyResource', array('url' => $url, 'type' => 'file', 'id' => 'TeacherUpload'));
                echo $form->input('id');
                echo $form->input('teacher_id', array('type' => 'hidden', 'value' => $teacher_id));
                echo $form->input('student_id', array('type' => 'hidden', 'value' => $student_id));
                ?>
                <div class="row">
                    <input type="radio" name="upload" value="assign" id="asss" <?php echo!empty($upload) && $upload == 'assign' ? 'checked="checked"' : '' ?> /> 
                    <label style="display: inline"> Assign Resources from Library</label>
                </div>
                <div class="row" >
                    <input type="radio" name="upload" value="new" id="neww" <?php echo!empty($upload) && $upload == 'new' ? 'checked="checked"' : '' ?> /> 
                    <label style="display: inline"> Assign new Resource</label>
                </div>

                <div id="assign" style="display: none;">
                    <?php
                    echo $form->input('category_id', array('class' => 'INPUT required', 'options' => $parentCategories, 'empty' => "Choose a category...", 'div' => array('class' => 'row required'), 'label' => 'Category'));
                    echo $form->input('resources', array('class' => 'INPUT chzn-select required', 'options' => $resources, 'data-placeholder' => "Choose a resource...", 'div' => array('class' => 'row required'), 'label' => 'File:', 'multiple' => true, 'style' => "width:350px;", 'tabindex' => "3"));
                    echo $form->input('date', array('type' => 'text', 'class' => 'INPUT required hasDate', 'div' => array('class' => 'row required')));
                    ?>
                </div>


                <div id="new" style="display: none;">
                    <?php
                    echo $form->input('name', array('class' => 'INPUT required', 'div' => array('class' => 'row required')));
                    echo $form->input('category_id', array('class' => 'INPUT required', 'options' => $parentCategories, 'empty' => "Choose a category...", 'div' => array('class' => 'row required'), 'label' => 'Category'));
                    echo $form->input('date2', array('label' => __('Date', true), 'type' => 'text', 'class' => 'INPUT required hasDate2', 'div' => array('class' => 'row required')));
                    ?>
                    <?php
                    echo $form->input('media_type', array('class' => 'INPUT required', 'options' => StudyResource::getDropDown(true), 'empty' => __('Select Media Type', true)));
                    ?>
                    <div id="image" class="hide">
                        <?php
                        echo $form->input('image', array('class' => 'INPUT', 'type' => 'file', 'label' => __('Image', true), 'between' =>
                            $this->element('image_input_between', array('info' => $image_settings['image'], 'field' => 'image', 'id' => (is_array($this->data) ? $this->data['StudyResource']['id'] : null), 'base_name' => (is_array($this->data) ? $this->data['StudyResource']['image'] : '')))
                        ));
                        ?>
                    </div>

                    <div id="pdf" class="hide">
                        <?php
                        echo $form->input('file', array('class' => 'INPUT', 'type' => 'file', 'between' =>
                            $this->element('file_input_between', array('info' => $file_settings['file'], 'field' => 'file', 'id' => (is_array($this->data) ? $this->data['StudyResource']['id'] : null), 'base_name' => (is_array($this->data) ? $this->data['StudyResource']['file'] : '')))
                        ));
                        ?>
                    </div>
                    <div id="sound" class="hide">
                        <?php echo $uploader->upload('StudyResource', 'file', '', 'pdfs', 'Sound File', 'mp3,mp4', 100, '');
                        ?>
                    </div>
                    <div id="video" class="hide">
                        <?php
                        echo $uploader->upload('StudyResource', 'file', '', 'pdfs', 'Video File', 'mp4', 100, '');
                        ?>
                    </div>
                    <div id="questionnaire" class="hide">
                        <?php echo $form->input('external_id', array('class' => 'INPUT', 'options' => $questionnaires, 'label' => __('Questionnaires', true), 'empty' => __('Select Questionnaire', true))); ?>
                    </div>
                    <div id="youtube" class="hide">
                        <?php echo $form->input('external_id', array('class' => 'INPUT', 'label' => __('Youtube Video', true))); ?>
                    </div>
                    <div id="recorded" class="hide">
                        <div class="input select">
                            <label for="RecordedLessons"><?php echo __('Recorded Lesson', true) ?></label>
                            <div class="clear"></div>
                            <?php echo $form->input('external_id', array('div' => false, 'type' => 'select', 'id' => 'RecordedLessons', 'style' => "width:650px;", 'class' => 'INPUT', 'label' => false, 'empty' => __('Select Recorderd lesson', true))); ?>
                        </div>
                    </div>
                    <?php
                    echo $form->input('topics', array('class' => 'INPUT chzn-select required', 'options' => $topics, 'data-placeholder' => "Choose a topic...", 'div' => array('class' => 'row required'), 'label' => 'Topics:', 'multiple' => true, 'style' => "width:650px;", 'tabindex' => "3", 'selected' => !empty($selected_topics) ? $selected_topics : ''));
                    echo '<div class="row required">';
                    echo $form->input('suggested_for_library', array('class' => 'INPUT', 'label' => false, 'div' => false));
                    echo '<label for="StudyResourceSuggestedForLibrary" style="display: inline" >Suggested For Library</label>';
                    echo '</div>';
                    ?>
                </div>
                <br />
                <?php
                if (!empty($Errors['Upload'])) {
                    echo '<div class="error-message">' . $Errors['upload'] . '</div>';
                }

                echo $form->submit(__('Submit', true), array('class' => 'btn-submit'));
                echo $form->end();
                ?>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>

<script>
    jQuery(function () {

        jQuery('input[name="upload"]').click(function () {
            var i = $(this).val();

            if (i == 'assign') { //the "no" radiobutton
                $('#assign').css('display', 'block');
                $('#new').css('display', 'none');
                $('#new input').attr('disabled', 'disabled');
                $('#new select').attr('disabled', 'disabled');
                $('#assign input').removeAttr('disabled');
                $('#assign select').removeAttr('disabled');
                //$('input[id="registeration-no"]').attr("disabled", "disabled");
            } else {
                $('#new').css('display', 'block');
                $('#assign').css('display', 'none');
                $('#assign input').attr('disabled', 'disabled');
                $('#assign select').attr('disabled', 'disabled');
                $('#new input').removeAttr('disabled');
                $('#new select').removeAttr('disabled');
                //$('input[id="registeration-no"]').removeAttr("disabled");
            }
        });
        jQuery('input[name="upload"]:checked').trigger('click');





    });
</script>
<?php
echo $javascript->link(array('chosen.jquery.min'));
echo $html->css(array('chosen'));
//
?>
<script type="text/javascript"> $(".chzn-select").chosen();</script>
<script>
    $(function () {
        getRecorded();
        $('.hide').hide();
        $('#StudyResourceMediaType').change(function () {
            $val = $(this).val();
            if ($val != '') {
                $('.hide').slideUp();
                $('.hide input').attr('disabled', 'disabled');
                $('.hide select').attr('disabled', 'disabled');
                $('#' + $val).slideDown('slow');
                $('#' + $val + ' input').removeAttr('disabled');
                $('#' + $val + ' select').removeAttr('disabled');
//                $("#RecordedLessons").chosen({});
            }
        }).trigger('change');
    });

    function getRecorded() {
        $val = '<?php echo $teacher_id ?>';
        $student_id = '<?php echo $student_id ?>';
        $selected = '<?php echo!empty($this->data['StudyResource']['external_id']) && $this->data['StudyResource']['media_type'] == 'recorded' ? $this->data['StudyResource']['external_id'] : '' ?>';
        if ($val != '') {
            $.ajax({
                url: "<?php echo Router::url('/study_resources/getRecordedLessons'); ?>/" + $val + '/' + $student_id,
                dataType: 'json',
                type: 'GET',
                cache: false,
                success: function (data) {
                    $('#RecordedLessons').html('<option value=""><?= __('Select Recorderd lesson', true) ?></option>');
                    for (var i in data) {
                        $selected_value = '';
                        if (i == $selected) {
                            $selected_value = 'selected="selectedd"';
                        }
                        $('#RecordedLessons').append('<option value="' + i + '" ' + $selected_value + '>' + data[i] + '</option>');
                    }
                    $("#RecordedLessons").chosen({
                    });
                }
            });
        }

    }
</script>
<?= $html->css(array('ui-lightness/jquery-ui-1.8.6.custom')) ?>
<?= $javascript->link(array('jquery-ui-1.8.6.custom.min')) ?>
<script type="text/javascript">
    var jsDateFormat = 'yy-mm-dd';
    $(function () {
        $('.hasDate').datepicker({
            dateFormat: jsDateFormat
        });
        $('.hasDate2').datepicker({
            dateFormat: jsDateFormat
        });
    });

</script>