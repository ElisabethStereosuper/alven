<div class='contact' id="contact">
    <div>
        <h3 class='title-maj'><?php the_field('pitchTitle', CONTACT_ID); ?></h3>
        <?php the_field('pitchText', CONTACT_ID); ?>
        <?php if($status === 'success'){ ?>
            <p class='form-success'>
                <?php _e('Your pitch has been sent!', 'alven'); ?>
                <br>
                <?php _e('Thank you, we will be back to you shortly.', 'alven'); ?>
            </p>
        <?php }else{ ?>
            <?php if($status === 'error'){ ?>
                <p class='form-error'><?php echo $errorSend; ?></p>
            <?php } ?>
            <button class='btn btn-left open-form'><?php _e('Send your pitch', 'alven'); ?></button>
            <div class="form-to-open <?php if($status === "error") echo "form-open-error"; ?>">
                <form action='<?php the_permalink(); ?>#contact' method='post' enctype='multipart/form-data' class='form'>
                    <div class='field-wrapper'>
                        <div class='field js-field <?php if($errorFirstname) echo "invalid"; ?>'>
                            <input type='text' name='firstname' id='firstname' required class='form-elt <?php if($errorFirstname) echo "invalid"; ?>' value='<?php echo $firstname; ?>'>
                            <label class="label <?php if($firstname) echo 'off'; ?>" for='firstname'><?php _e('First name', 'alven'); ?>*</label>
                        </div>
                        <div class='field js-field <?php if($errorLastname) echo "invalid"; ?>'>
                            <input type='text' name='lastname' id='lastname' required class='form-elt <?php if($errorLastname) echo "invalid"; ?>' value='<?php echo $lastname; ?>'>
                            <label class="label <?php if($lastname) echo 'off'; ?>" for='lastname'><?php _e('Last name', 'alven'); ?>*</label>
                        </div>
                    </div>
                <div class='field js-field <?php if($errorEmail) echo "invalid"; ?>'>
                        <input type='email' name='realemail' id='realemail' required class='form-elt <?php if($errorEmail) echo "invalid"; ?>' value='<?php echo $email; ?>'>
                        <label class="label <?php if($email) echo 'off'; ?>" for='realemail'><?php _e('Email', 'alven'); ?>*</label>
                    </div>
                    <div class='field js-field <?php if($errorCompanyname) echo "invalid"; ?>'>
                        <input type='text' name='companyname' id='companyname' required class='form-elt <?php if($errorCompanyname) echo "invalid"; ?>' value='<?php echo $companyname; ?>'>
                        <label class="label <?php if($companyname) echo 'off'; ?>" for='companyname'><?php _e('Company name', 'alven'); ?>*</label>
                    </div>
                    <div class='field-wrapper'>
                        <div class='field js-field <?php if($errorWebsite) echo "invalid"; ?>'>
                            <input type='url' name='website' id='firstname' class='form-elt <?php if($errorWebsite) echo "invalid"; ?>' value='<?php echo $website; ?>'>
                            <label class="label <?php if($website) echo 'off'; ?>" for='website'><?php _e('Website', 'alven'); ?></label>
                        </div>
                        <div class='field js-field <?php if($errorLinkedin) echo "invalid"; ?>'>
                            <input type='url' name='linkedin' id='linkedin' class='form-elt <?php if($errorLinkedin) echo "invalid"; ?>' value='<?php echo $linkedin; ?>'>
                            <label class="label <?php if($linkedin) echo 'off'; ?>" for='linkedin'><?php _e('LinkedIn', 'alven'); ?></label>
                        </div>
                    </div>
                <div class='field js-field <?php if($errorDate) echo "invalid"; ?>'>
                        <input type='date' name='date' id='date' class='form-elt <?php if($errorDate) echo "invalid"; ?>' value='<?php echo $date; ?>'>
                        <label class="label <?php if($date) echo 'off'; ?>" for='date'><?php _e('Date', 'alven'); ?></label>
                    </div>
                    <div class='field js-field <?php if($errorAddress) echo "invalid"; ?>'>
                        <textarea id='address' name='address' class='form-elt <?php if($errorAddress) echo "invalid"; ?>'><?php echo $address; ?></textarea>
                        <label class="label <?php if($address) echo 'off'; ?>"  for='address'><?php _e('Headquarter address', 'alven'); ?></label>
                    </div>
                    <div class='field js-field <?php if($errorDesc) echo "invalid"; ?>'>
                        <textarea id='desc' name='desc' required class='form-elt <?php if($errorDesc) echo "invalid"; ?>'><?php echo $desc; ?></textarea>
                        <label class="label <?php if($desc) echo 'off'; ?>"  for='desc'><?php _e('What do you do in one sentence?', 'alven'); ?>*</label>
                    </div>
                    <div class='field js-field <?php if($errorRaising) echo "invalid"; ?>'>
                        <input type='text' name='raising' id='raising' required class='form-elt <?php if($errorRaising) echo "invalid"; ?>' value='<?php echo $raising; ?>'>
                        <label class="label <?php if($raising) echo 'off'; ?>" for='raising'><?php _e('How much are you raising?', 'alven'); ?>*</label>
                    </div>
                    <div class='field js-field <?php if($errorStage) echo "invalid"; ?>'>
                        <input type='text' name='stage' id='stage' required class='form-elt <?php if($errorStage) echo "invalid"; ?>' value='<?php echo $raising; ?>'>
                        <label class="label <?php if($stage) echo 'off'; ?>" for='stage'><?php _e('What\'s your investment stage?', 'alven'); ?>*</label>
                    </div>
                    <div class='field js-field <?php if($errorSector) echo "invalid"; ?>'>
                        <select name='sector' id='sector' class='form-elt <?php if($errorSector) echo "invalid"; ?>'>
                            <option value='' disabled <?php if(!$sector) echo "selected"; ?>><?php _e('Industry field', 'alven'); ?></option>
                            <option value='Agriculture & Food' <?php if($sector == 'Agriculture & Food') echo "selected"; ?>><?php _e('Agriculture & Food', 'alven'); ?></option>
                            <option value='Cloud Native Network & Computing' <?php if($sector == 'Cloud Native Network & Computing') echo "selected"; ?>><?php _e('Cloud Native Network & Computing', 'alven'); ?></option>
                            <option value='Digital Transformation' <?php if($sector == 'Digital Transformation') echo "selected"; ?>><?php _e('Digital Transformation', 'alven'); ?></option>
                            <option value='Education' <?php if($sector == 'Education') echo "selected"; ?>><?php _e('Education', 'alven'); ?></option>
                            <option value='Energy, Cleantech & Climate' <?php if($sector == 'Energy, Cleantech & Climate') echo "selected"; ?>><?php _e('Energy, Cleantech & Climate', 'alven'); ?></option>
                            <option value='Finance & Insurance' <?php if($sector == 'Finance & Insurance') echo "selected"; ?>><?php _e('Finance & Insurance', 'alven'); ?></option>
                            <option value='Gaming, Entertainment & Wellbeing' <?php if($sector == 'Gaming, Entertainment & Wellbeing') echo "selected"; ?>><?php _e('Gaming, Entertainment & Wellbeing', 'alven'); ?></option>
                            <option value='Health & Life Sciences' <?php if($sector == 'Health & Life Sciences') echo "selected"; ?>><?php _e('Health & Life Sciences', 'alven'); ?></option>
                            <option value='Human Resources' <?php if($sector == 'Human Resources') echo "selected"; ?>><?php _e('Human Resources', 'alven'); ?></option>
                            <option value='Industrial' <?php if($sector == 'Industrial') echo "selected"; ?>><?php _e('Industrial', 'alven'); ?></option>
                            <option value='Legal & Public' <?php if($sector == 'Legal & Public') echo "selected"; ?>><?php _e('Legal & Public', 'alven'); ?></option>
                            <option value='Logistics & Supply Chain' <?php if($sector == 'Logistics & Supply Chain') echo "selected"; ?>><?php _e('Logistics & Supply Chain', 'alven'); ?></option>
                            <option value='Media & Social' <?php if($sector == 'Media & Social') echo "selected"; ?>><?php _e('Media & Social', 'alven'); ?></option>
                            <option value='Real Estate & Construction' <?php if($sector == 'Real Estate & Construction') echo "selected"; ?>><?php _e('Real Estate & Construction', 'alven'); ?></option>
                            <option value='Retail & Ecommerce' <?php if($sector == 'Retail & Ecommerce') echo "selected"; ?>><?php _e('Retail & Ecommerce', 'alven'); ?></option>
                            <option value='Sales, Marketing & Advertisement' <?php if($sector == 'Sales, Marketing & Advertisement') echo "selected"; ?>><?php _e('Sales, Marketing & Advertisement', 'alven'); ?></option>
                            <option value='Security' <?php if($sector == 'Security') echo "selected"; ?>><?php _e('Security', 'alven'); ?></option>
                            <option value='Software Development & DevTools' <?php if($sector == 'Software Development & DevTools') echo "selected"; ?>><?php _e('Software Development & DevTools', 'alven'); ?></option>
                            <option value='Telecom' <?php if($sector == 'Telecom') echo "selected"; ?>><?php _e('Telecom', 'alven'); ?></option>
                            <option value='Transportation & Mobility' <?php if($sector == 'Transportation & Mobility') echo "selected"; ?>><?php _e('Transportation & Mobility', 'alven'); ?></option>
                        </select>
                    </div>
                    <div class='field-wrapper'>
                        <div class='field js-field <?php if($errorTech) echo "invalid"; ?>'>
                            <select name='tech' id='tech' class='form-elt <?php if($errorTech) echo "invalid"; ?>'>
                                <option value='' disabled <?php if(!$tech) echo "selected"; ?>><?php _e('Technology', 'alven'); ?></option>
                                <option value='AI' <?php if($tech == 'AI') echo "selected"; ?>><?php _e('AI', 'alven'); ?></option>
                                <option value='Big/Smart Data' <?php if($tech == 'Big/Smart Data') echo "selected"; ?>><?php _e('Big/Smart Data', 'alven'); ?></option>
                                <option value='Blockchain' <?php if($tech == 'Blockchain') echo "selected"; ?>><?php _e('Blockchain', 'alven'); ?></option>
                                <option value='Consumable' <?php if($tech == 'Consumable') echo "selected"; ?>><?php _e('Consumable', 'alven'); ?></option>
                                <option value='Hardware' <?php if($tech == 'Hardware') echo "selected"; ?>><?php _e('Hardware', 'alven'); ?></option>
                                <option value='IoT' <?php if($tech == 'IoT') echo "selected"; ?>><?php _e('IoT', 'alven'); ?></option>
                                <option value='Low-Tech' <?php if($tech == 'Low-Tech') echo "selected"; ?>><?php _e('Low-Tech', 'alven'); ?></option>
                                <option value='Marketplace' <?php if($tech == 'Marketplace') echo "selected"; ?>><?php _e('Marketplace', 'alven'); ?></option>
                                <option value='Material' <?php if($tech == 'Material') echo "selected"; ?>><?php _e('Material', 'alven'); ?></option>
                                <option value='Mobile App / Website' <?php if($tech == 'Mobile App / Website') echo "selected"; ?>><?php _e('Mobile App / Website', 'alven'); ?></option>
                                <option value='Nanotech' <?php if($tech == 'Nanotech') echo "selected"; ?>><?php _e('Nanotech', 'alven'); ?></option>
                                <option value='Other' <?php if($tech == 'Other') echo "selected"; ?>><?php _e('Other', 'alven'); ?></option>
                                <option value='Process / IP' <?php if($tech == 'Process / IP') echo "selected"; ?>><?php _e('Process / IP', 'alven'); ?></option>
                                <option value='Quantum' <?php if($tech == 'Quantum') echo "selected"; ?>><?php _e('Quantum', 'alven'); ?></option>
                                <option value='Software / SaaS' <?php if($tech == 'Software / SaaS') echo "selected"; ?>><?php _e('Software / SaaS', 'alven'); ?></option>
                                <option value='VR / AR / 3D' <?php if($tech == 'VR / AR / 3D') echo "selected"; ?>><?php _e('VR / AR / 3D', 'alven'); ?></option>
                            </select>
                        </div>
                        <div class='field js-field <?php if($errorBusiness) echo "invalid"; ?>'>
                            <select name='business' id='business' class='form-elt <?php if($errorBusiness) echo "invalid"; ?>'>
                                <option value='' disabled <?php if(empty($business)) echo "selected"; ?>><?php _e('Business model', 'alven'); ?></option>
                                <option value='B2B' <?php if($business == 'B2B') echo "selected"; ?>><?php _e('B2B', 'alven'); ?></option>
                                <option value='B2C' <?php if($business == 'B2C') echo "selected"; ?>><?php _e('B2C', 'alven'); ?></option>
                                <option value='B2G' <?php if($business == 'B2G') echo "selected"; ?>><?php _e('B2G', 'alven'); ?></option>
                                <option value='C2C' <?php if($business == 'C2C') echo "selected"; ?>><?php _e('C2C', 'alven'); ?></option>
                                <option value='B2B2C' <?php if($business == 'B2B2C') echo "selected"; ?>><?php _e('B2B2C', 'alven'); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class='field js-field <?php if($errorDeck) echo "invalid"; ?>'>
                        <label for='deck' class="label-fixed" ><?php _e('Drop your deck', 'alven'); ?>* <span class='form-desc'>(.pdf, .key, .ptt, .pptx)</span></label>
                        <input type='hidden' name='MAX_FILE_SIZE' value='20971520'>
                        <input type='file' required name='deck' id='deck' class='form-elt <?php if($errorDeck) echo "invalid"; ?>'>
                    </div>
                    <div class='field js-field <?php if($errorRef) echo "invalid"; ?>'>
                        <input type='text' name='ref' id='ref' class='form-elt <?php if($errorRef) echo "invalid"; ?>' value='<?php echo $ref; ?>'>
                        <label class="label <?php if($ref) echo 'off'; ?>" for='ref'><?php _e('How did you hear about us?', 'alven'); ?></label>
                    </div>

                    <label class="ohnohoney" for="fullname"></label>
                    <input class="ohnohoney" autocomplete="off" type="text" id="fullname" name="fullname" placeholder="Your name here" value='<?php echo $honeyname; ?>'>
                    <label class="ohnohoney" for="email"></label>
                    <input class="ohnohoney" autocomplete="off" type="email" id="email" name="email" placeholder="Your e-mail here" value='<?php echo $honeymail; ?>'>
                    
                    <button type='submit' name='submitpitch' class='btn'><?php _e('Confirm', 'alven'); ?></button>
                </form>
            </div>
        <?php } ?>
    </div>

    <div>
        <h3 class='title-maj'><?php the_field('generalTitle', CONTACT_ID); ?></h3>
        <?php the_field('generalText', CONTACT_ID); ?>
        <?php if($status2 === 'success'){ ?>
            <p class='form-success'>
                <?php _e('Your message has been sent!', 'alven'); ?>
                <br>
                <?php _e('Thank you, we will be back to you shortly.', 'alven'); ?>
            </p>
        <?php }else{ ?>
            <?php if($status2 === 'error'){ ?>
                <p class='form-error'><?php echo $errorSend2; ?></p>
            <?php } ?>
            <button class='btn open-form'><?php _e('Contact us', 'alven'); ?></button>
            <div class="form-to-open <?php if($status2 === "error") echo "form-open-error"; ?>">
                <form action='<?php the_permalink(); ?>#contact' method='post' class='form'>
                    <div class='field-wrapper'>
                        <div class='field js-field <?php if($errorFirstname2) echo "invalid"; ?>'>
                            <input type='text' name='firstname2' id='firstname2' required class='form-elt <?php if($errorFirstname2) echo "invalid"; ?>' value='<?php echo $firstname2; ?>'>
                            <label class="label <?php if($firstname2) echo 'off'; ?>" for='firstname2'><?php _e('First name', 'alven'); ?>*</label>
                        </div>
                        <div class='field js-field <?php if($errorLastname2) echo "invalid"; ?>'>
                            <input type='text' name='lastname2' id='lastname2' required class='form-elt <?php if($errorLastname2) echo "invalid"; ?>' value='<?php echo $lastname2; ?>'>
                            <label class="label <?php if($lastname2) echo 'off'; ?>" for='lastname2'><?php _e('Last name', 'alven'); ?>*</label>
                        </div>
                    </div>
                    <div class='field js-field <?php if($errorEmail2) echo "invalid"; ?>'>
                        <input type='email' name='realemail2' id='realemail2' required class='form-elt <?php if($errorEmail2) echo "invalid"; ?>' value='<?php echo $email2; ?>'>
                        <label class="label <?php if($email2) echo 'off'; ?>" for='realemail2'><?php _e('Email', 'alven'); ?>*</label>
                    </div>
                    <div class='field js-field <?php if($errorMsg2) echo "invalid"; ?>'>
                        <textarea id='msg' name='msg2' required class='form-elt <?php if($errorMsg2) echo "invalid"; ?>'><?php echo $msg2; ?></textarea>
                        <label class="label <?php if($msg2) echo 'off'; ?>"  for='msg2'><?php _e('Message', 'alven'); ?>*</label>
                    </div>

                    <label class="ohnohoney" for="fullname2"></label>
                    <input class="ohnohoney" autocomplete="off" type="text" id="fullname2" name="fullname2" placeholder="Your name here" value='<?php echo $honeyname2; ?>'>
                    <label class="ohnohoney" for="email2"></label>
                    <input class="ohnohoney" autocomplete="off" type="email" id="email2" name="email2" placeholder="Your e-mail here" value='<?php echo $honeymail2; ?>'>

                    <button type='submit' name='submitcontact' class='btn'><?php _e('Confirm', 'alven'); ?></button>
                </form>
            </div>
        <?php } ?>
    </div>
</div>
