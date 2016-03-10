<?

/*******************************************************************************
* Filename : lang.eng.php
* Description : english language
*******************************************************************************/

## HTML ##
$app[lang][html]['title'] = "{$app[name][autoresponse]}<br>";
$app[lang][html]['webmin_title'] = " {$app[name][client]} {$app[name][response]} : Administration Page ";
$app[lang][html]['root_title'] = " {$app[name][client]} {$app[name][response]} : Root Administration Page ";
$app[lang][html]['vendor_title'] = " {$app[name][client]} {$app[name][response]} ";

## PAGINATION ##
$app[lang][txt][page] = "Page";
$app[lang][txt][out_of] = "out of";
$app[lang][txt][all] = "ALL";

## ERROR COMPONENT ##
$app[lang][error]['header'] = "<div id='msg_error'>The following error occured :<br>";
$app[lang][error]['element'] = "<li>";
$app[lang][error]['footer'] = "</div>";
$app[lang][error]['title'] = "Error...";

## ERROR TYPE ##
$app[lang][error]['empty'] = "Must be filled";
$app[lang][error]['digit'] = "Must be digit.<br>";
$app[lang][error]['date'] = "Must be a valid date.<br>";
$app[lang][error]['checkbox'] = "Select at least one record.<br>";
$app[lang][error]['select'] = "Must be selected";
$app[lang][error]['email'] = "Must be a valid email address";
$app[lang][error]['phone'] = "Must be a valid phone number";
$app[lang][error]['numeric'] = "Must be a valid numeric.<br>";
$app[lang][error]['invalid_login'] = "Invalid username or password.<br>";
$app[lang][error]['agn_invalid_login'] = "Invalid handphone or password.<br>";
$app[lang][error]['adm_not_login'] = "You're not loggin yet ...<br>Please login <a href='$app[www]/index.php'>here</a><br>";
$app[lang][error]['adm_no_permission'] = "Sorry you do not have permission to use this application.{$app[lang][button][back]}<br>";

$app[lang][error]['agn_not_login'] = "You're not loggin yet ...<br>lease login <a href='$app[www]/agent/index.php'>here</a><br>";
$app[lang][error]['agn_no_permission'] = "Sorry you do not have permission to use this application.{$app[lang][button][back]}<br>";
$app[lang][error]['invalid_image_validator']="Not match code entered.<br>";
$app[lang][error]['root_not_login'] = "You're not loggin yet ...<br>Please login <a href='$app[www_setup]/index.php?act=login_setup&step=1'>here</a><br>";
$app[lang][error]['char']="Out of maximal character";
$app[lang][error]['username_exist'] = "Username already exist, Please try another one.";
$app[lang][error]['email_exist'] = "Sorry, your email has been subscribed. <br>Please register with other email.<br>";
$app[lang][error]['password_not_match'] = "Please retype your new password correctly";
$app[lang][error]['one_application_required'] = "You must select at least one application for user.<br>";
$app[lang][error]['image.ERR_TYPE'] = "Type error.<br>";
$app[lang][error]['image.ERR_WIDTH'] = "Height and weight error.<br>";
$app[lang][error]['image.ERR_SIZE'] = "Size error.<br>";
$app[lang][error]['ERR_COPY'] = "Upload error.<br>";
$app[lang][error]['file.ERR_SIZE'] = "File size error.<br>";
$app[lang][error]['username_not_found'] = "Username not found in database.<br>";

## SUCCESS TYPE ##
$app[lang][success]['title'] = "Success...<br>";
$app[lang][success]['icon']="<img src=$app[www]/img/icon_success.gif />";

## WEEKDAY ##
$app[lang][weekday][1] = 'Monday';
$app[lang][weekday][2] = 'Tuesday';
$app[lang][weekday][3] = 'Wednesday';
$app[lang][weekday][4] = 'Thursday';
$app[lang][weekday][5] = 'Friday';
$app[lang][weekday][6] = 'Saturday';
$app[lang][weekday][7] = 'Sunday';

## MONTH ##
$app[lang][month][0]="January";
$app[lang][month][1]="February";
$app[lang][month][2]="March";
$app[lang][month][3]="April";
$app[lang][month][4]="May";
$app[lang][month][5]="June";
$app[lang][month][6]="July";
$app[lang][month][7]="August";
$app[lang][month][8]="September";
$app[lang][month][9]="October";
$app[lang][month][10]="November";
$app[lang][month][11]="December";

## FORM ##
$app[lang][field][name] = "Name<br>";
$app[lang][field][username] = "Username<br>";
$app[lang][field][code] = "Code<br>";
$app[lang][field][username_chat] = "Username Chat<br>";
$app[lang][field][password] = "Password<br>";
$app[lang][field][retype_password] = "Retype password<br>";

$app[lang][field][picture] = "Picture<br>";
$app[lang][field][thumbnail] = "Thumbnail<br>";
$app[lang][field][name] = "Name<br>";
$app[lang][field][home_address] = "Address<br>";
$app[lang][field][phone_number] = "Phone<br>";
$app[lang][field][person] = "Person<br>";
$app[lang][field][admin] = "Admin<br>";
$app[lang][field][adm_password] = "Admin Password<br>";
$app[lang][field][agent] = "Agent<br>";
$app[lang][field][agn_staff] = "Staff Agent<br>";
$app[lang][field][agn_password] = "Agent Password<br>";
$app[lang][field][handling] = "Handling<br>";
$app[lang][field][hnd_staff] = "Staff Handling<br>";
$app[lang][field][hnd_password] = "Handling Password<br>";
$app[lang][field][question] = "Question<br>";
$app[lang][field][answer] = "Answer<br>";
$app[lang][field][gender] = "Gender<br>";
$app[lang][field][birth_place] = "Birth Place<br>";
$app[lang][field][birthday] = "Birthday<br>";
$app[lang][field][phone] = "Phone<br>";
$app[lang][field][email_address] = "Email<br>";
$app[lang][field][msg] = "Message<br>";
$app[lang][field][access] = "For<br>";
$app[lang][field][job] = "Job<br>";

$app[lang][field][title] = "Title<br>";
$app[lang][field]['link'] = "Link<br>";
$app[lang][field][description] = "Description<br>";
$app[lang][field][category] = "Category<br>";
$app[lang][field]['file'] = "File<br>";
$app[lang][field][topic] = "Topic<br>";
$app[lang][field][option] = "Option<br>";
$app[lang][field][address] = "Address<br>";
$app[lang][field][lead] = "Lead<br>";
$app[lang][field][content] = "Content<br>";

## INFO ##
$app[lang][info]['header'] = "<div id='msg_info' align=center style=\"visibility:visible\"><b class=\"rtop\"><b class=\"r1\"></b><b class=\"r2\"></b><b class=\"r3\"></b><b class=\"r4\"></b></b>";
$app[lang][info]['footer'] = "<a href=\"javascript:hide('msg_info')\">Ok</a><b class=\"rbottom\"><b class=\"r4\"></b><b class=\"r3\"></b><b class=\"r2\"></b><b class=\"r1\"></b></b></div>";
$app[lang][info]['adm_logout'] = "Admin has logout.<br>";
$app[lang][info]['root_logout'] = "Root has logout.<br>";
$app[lang][info]['email'] = "Type valid email. Example : xxxxx@yahoo.com";
$app[lang][info]['phone'] = "Type valid phone number. Example : +62317XXXXXX";
$app[lang][info]['user_added'] = "New user has been added to database.<br>";
$app[lang][info]['user_modified'] = "User has been modified.<br>";
$app[lang][info]['user_deleted'] = "Selected user has been deleted.<br>";
$app[lang][info]['user_set_status'] = "User status has been modified.<br>";
$app[lang][info]['password_modified'] = "Password user has been modified.<br>";
$app[lang][info]['theme_modified'] = "Theme user has been modified.<br>";
$app[lang][info]['config_modified'] = "System configuration has been modified.<br>";

$app[lang][info]['inbox_deleted'] = "Selected inbox has been deleted.<br>";
$app[lang][info]['inbox_status'] = "Status selected inbox has been readed.<br>";
$app[lang][info]['outbox_deleted'] = "Selected outbox has been deleted.<br>";
$app[lang][info]['resend_outbox'] = "Selected resend outbox has been sent.<br>";

$app[lang][info]['event_added'] = "New event has been added to database.<br>";
$app[lang][info]['event_deleted'] = "Selected event has been deleted.<br>";

$app[lang][info]['modul_currency_modified'] = "Modul Currency has been modified.<br>";
$app[lang][info]['modul_shio_modified'] = "Modul Shio has been modified.<br>";
$app[lang][info]['modul_weather_modified'] = "Modul Weather has been modified.<br>";
$app[lang][info]['modul_tv_modified'] = "Modul TV has been modified.<br>";
$app[lang][info]['modul_hscope_modified'] = "Modul Horoscope has been modified.<br>";
$app[lang][info]['modul_stock_modified'] = "Modul Horoscope has been modified.<br>";
$app[lang][info]['modul_zodiak_modified'] = "Modul Zodiak has been modified.<br>";
$app[lang][info]['modul_sholat_modified'] = "Modul Sholat has been modified.<br>";
$app[lang][info]['fav_link_added'] = "Favorite Link has been added.<br>";
$app[lang][info]['fav_link_deleted'] = "Favorite Link selected has been deleted.<br>";

$app[lang][info]['ns_modified'] = "New Student has been modified.<br>";
$app[lang][info]['stdd_modified'] = "Student has been modified.<br>";
$app[lang][info]['lnk_modified'] = "Links has been modified.<br>";
$app[lang][info]['fs_modified'] = "Foreign Student has been modified.<br>";
$app[lang][info]['gr_modified'] = "Graduates has been modified.<br>";
$app[lang][info]['crt_modified'] = "Creativity has been modified.<br>";
$app[lang][info]['paper_modified'] = "Paper has been modified.<br>";
$app[lang][info]['schl_modified'] = "Scholarship has been modified.<br>";
$app[lang][info]['ach_modified'] = "Achievement has been modified.<br>";
$app[lang][info]['tlnt_modified'] = "Talent and Interest has been modified.<br>";

$app[lang][info]['agenda_added'] = "New agenda has been added to database.<br>";
$app[lang][info]['agenda_modified'] = "Agenda has been modified.<br>";
$app[lang][info]['agenda_deleted'] = "Selected agenda has been deleted.<br>";
$app[lang][info]['agenda_set_status'] = "Status selected agenda has been modified.<br>";

$app[lang][info]['dwnld_added'] = "New Download has been added to database.<br>";
$app[lang][info]['dwnld_modified'] = "Download has been modified.<br>";
$app[lang][info]['dwnld_deleted'] = "Selected download has been deleted.<br>";
$app[lang][info]['dwnld_set_status'] = "Status selected download has been modified.<br>";

$app[lang][info]['info_added'] = "New info has been added to database.<br>";
$app[lang][info]['info_modified'] = "Info has been modified.<br>";
$app[lang][info]['info_deleted'] = "Selected info has been deleted.<br>";
$app[lang][info]['info_set_status'] = "Status selected info has been modified.<br>";

$app[lang][info]['jobs_added'] = "New jobs has been added to database.<br>";
$app[lang][info]['jobs_modified'] = "Jobs has been modified.<br>";
$app[lang][info]['jobs_deleted'] = "Selected jobs has been deleted.<br>";
$app[lang][info]['jobs_set_status'] = "Status selected jobs has been modified.<br>";

$app[lang][info]['proc_added'] = "New procurement has been added to database.<br>";
$app[lang][info]['proc_modified'] = "Procurement has been modified.<br>";
$app[lang][info]['proc_deleted'] = "Selected procurement has been deleted.<br>";
$app[lang][info]['proc_set_status'] = "Status selected procurement has been modified.<br>";

$app[lang][info]['journal_added'] = "New journal has been added to database.<br>";
$app[lang][info]['journal_modified'] = "Journal has been modified.<br>";
$app[lang][info]['journal_deleted'] = "Selected Journal has been deleted.<br>";
$app[lang][info]['journal_set_status'] = "Status selected journal has been modified.<br>";

$app[lang][info]['beasiswa_added'] = "New beasiswa has been added to database.<br>";
$app[lang][info]['beasiswa_modified'] = "Beasiswa has been modified.<br>";
$app[lang][info]['beasiswa_deleted'] = "Selected Beasiswa has been deleted.<br>";
$app[lang][info]['beasiswa_set_status'] = "Status selected beasiswa has been modified.<br>";

$app[lang][info]['photo_added'] = "New photo has been added to database.<br>";
$app[lang][info]['photo_modified'] = "Photo has been modified.<br>";
$app[lang][info]['photo_deleted'] = "Selected Photo has been deleted.<br>";
$app[lang][info]['photo_set_status'] = "Status selected photo has been modified.<br>";

$app[lang][info]['profile_added'] = "New profile has been added to database.<br>";
$app[lang][info]['profile_modified'] = "Profile has been modified.<br>";
$app[lang][info]['profile_deleted'] = "Selected profile has been deleted.<br>";
$app[lang][info]['profile_set_status'] = "Status selected profile has been modified.<br>";

$app[lang][info]['quote_added'] = "New quote has been added to database.<br>";
$app[lang][info]['quote_modified'] = "Quote has been modified.<br>";
$app[lang][info]['quote_deleted'] = "Selected quote has been deleted.<br>";
$app[lang][info]['quote_set_status'] = "Status selected quote has been modified.<br>";

$app[lang][info]['upload_success'] = "File succesfully uploaded.<br>";
$app[lang][info]['file_deleted'] = "File succesfully deleted.<br>";

$app[lang][info]['category_added'] = "Category has been added.<br>";
$app[lang][info]['category_modified'] = "Category has been modified.<br>";
$app[lang][info]['category_deleted'] = "Category has been deleted.<br>";

$app[lang][info]['polling_added'] = "Polling has been added.<br>";
$app[lang][info]['polling_modified'] = "Polling has been modified.<br>";
$app[lang][info]['polling_deleted'] = "Polling has been deleted.<br>";

$app[lang][info]['phonebook_added'] = "Phonebook has been added.<br>";
$app[lang][info]['phonebook_modified'] = "Phonebook has been modified.<br>";
$app[lang][info]['phonebook_deleted'] = "Phonebook has been deleted.<br>";

$app[lang][info]['news_int_added'] = "Internal News has been added.<br>";
$app[lang][info]['news_int_modified'] = "Internal News has been modified.<br>";
$app[lang][info]['news_int_deleted'] = "Internal News has been deleted.<br>";

$app[lang][info]['user_template_added'] = "New template has been added to database.<br>";
$app[lang][info]['user_template_modified'] = "Template has been modified.<br>";
$app[lang][info]['user_template_deleted'] = "Selected template has been deleted.<br>";

$app[lang][info]['news_category_added'] = "New news category has been added to database.<br>";
$app[lang][info]['news_category_modified'] = "News Category has been modified.<br>";
$app[lang][info]['news_category_deleted'] = "Selected news category has been deleted.<br>";
$app[lang][info]['news_category_set_status'] = "Status selected news category has been modified.<br>";

$app[lang][info]['news_added'] = "New news has been added to database.<br>";
$app[lang][info]['news_modified'] = "News has been modified.<br>";
$app[lang][info]['news_deleted'] = "Selected news has been deleted.<br>";
$app[lang][info]['news_set_status'] = "Status selected news has been modified.<br>";

$app[lang][info]['download_category_added'] = "New download category has been added to database.<br>";
$app[lang][info]['download_category_modified'] = "Download category has been modified.<br>";
$app[lang][info]['download_category_deleted'] = "Selected download category has been deleted.<br>";
$app[lang][info]['download_category_set_status'] = "Status selected download category has been modified.<br>";

$app[lang][info]['download_added'] = "New download has been added to database.<br>";
$app[lang][info]['download_modified'] = "Download has been modified.<br>";
$app[lang][info]['download_deleted'] = "Selected download has been deleted.<br>";
$app[lang][info]['download_set_status'] = "Status selected download has been modified.<br>";

$app[lang][info]['dep_added'] = "New departement has been added to database.<br>";
$app[lang][info]['dep_modified'] = "Departement has been modified.<br>";
$app[lang][info]['dep_deleted'] = "Selected departement has been deleted.<br>";
$app[lang][info]['dep_set_status'] = "Status selected departement has been modified.<br>";

$app[lang][info]['image_quote_added'] = "New quote image has been added to database.<br>";
$app[lang][info]['image_quote_modified'] = "Quote image has been modified.<br>";
$app[lang][info]['image_quote_deleted'] = "Selected quote image has been deleted.<br>";
$app[lang][info]['image_quote_set_status'] = "Status selected quote image has been modified.<br>";

$app[lang][info]['image_login_added'] = "New welcome image has been added to database.<br>";
$app[lang][info]['image_login_modified'] = "Welcome image has been modified.<br>";
$app[lang][info]['image_login_deleted'] = "Selected welcome image has been deleted.<br>";
$app[lang][info]['image_login_set_status'] = "Status selected welcome image has been modified.<br>";

$app[lang][info]['welcome_message_modified'] = "Welcome message has been modified.<br>";
$app[lang][info]['setup_modified'] = "Setup has been modified.<br>";
$app[lang][info]['logo_modified'] = "Logo has been modified.<br>";
$app[lang][info]['module_modified'] = "Module has been modified.<br>";
$app[lang][info]['user_reset_pass'] = "Password user has been reset.<br>";

$app[lang][info]['curr_updated'] = "Currency has been updated.<br>";

$app[lang][info]['modul_updated']="Module has been updated";

$app[lang][info]['reg_set_status'] = "Status registration has been modified.<br>";
$app[lang][info]['reg_deleted'] = "Selected registration has been deleted.<br>";
$app[lang][info]['import_added'] = "Import has been succeed.<br>";


?>