<div class="row">
    <img src="<?php echo base_url() ?>images/header_contact_us.jpg"  class="col-md-12 img-responsive" />
</div>
<div class="row">
    <br />
    <div class="container">
        <h3>Contact Us</h3>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="well">
                        <?php
                        $attributes = array('class' => '', 'id' => '');
                        echo form_open('pub/contact', $attributes);
                        ?>
                        <p>
                            <label for="email">Email <span class="required">*</span></label>
                            <?php echo form_error('email'); ?>
                            <br /><input id="email" class="input-sm form-control" type="text" name="email" maxlength="32" value="<?php echo set_value('email'); ?>"  />
                        </p>
                        <p>
                            <label for="subject">Subject <span class="required">*</span></label>
                            <?php echo form_error('subject'); ?>
                            <br /><input id="subject" class="input-sm form-control" type="text" name="subject" maxlength="50" value="<?php echo set_value('subject'); ?>"  />
                        </p>
                        <p>
                            <label for="message">Message <span class="required">*</span></label>
                            <?php echo form_error('message'); ?>
                            <br />
                            <?php echo form_textarea(array('name' => 'message', 'rows' => '3', 'class' => 'form-control', 'cols' => '80', 'value' => set_value('message'))) ?>
                        </p>
                        <img src="<?php echo site_url('/pub/show_captcha/'.rand())?>" id='captchaimg' ><br />
                        <label for="captcha">Enter the code above here :</label> 
						<?php echo form_error('captcha'); ?> <br />
                        <input id="6_letters_code" name="6_letters_code" type="text">  <br />
					    <small>Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh</small>
						<script language='JavaScript' type='text/javascript'>
                            function refreshCaptcha()
                            {
                                var img = document.images['captchaimg'];
                                img.src = img.src.substring(0, img.src.lastIndexOf("<?php site_url('/pub/show_captcha/'.rand())?>")) + "?rand=" + Math.random() * 1000;
                            }
                        </script>

                        <p>
                            <?php echo form_submit('submit', 'Submit', 'class', 'btn btn-default>'); ?>
                        </p>

                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h4>Address</h4>
                    <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps/ms?msa=0&amp;msid=200868312368598203649.0004f462c6bf9bf799929&amp;ie=UTF8&amp;ll=14.672726,121.049846&amp;spn=0,0&amp;t=m&amp;output=embed"></iframe><br /><small>View <a href="https://maps.google.com/maps/ms?msa=0&amp;msid=200868312368598203649.0004f462c6bf9bf799929&amp;ie=UTF8&amp;ll=14.672726,121.049846&amp;spn=0,0&amp;t=m&amp;source=embed" style="color:#0000FF;text-align:left">Central IRM Evangelical Church</a> in a larger map</small>
                    <br />
                    <br />
                    351 Tandang Sora Ave Pasong Tamo,<br />
                    Quezon City, Philippines
                    <h4>Phone</h4>
                    (02) 455 0734
                    <h4>Social Accounts</h4>
                    <ul>
                        <li><a href="https://www.facebook.com/irm.evangelical.church">Facebook</a></li>
                        <li><a href="http://www.twitter.com/irmec92">Twitter @irmec92</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
