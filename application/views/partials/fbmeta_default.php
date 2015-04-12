<?php
if(empty($fbmeta_data)):?>

<meta property="og:title" content="IRM Evangelical Church"/>
<meta property="og:site_name" content="IRM Evangelical Church"/>
<meta property="og:description" content="We envision that our corporate effort shall contribute to the fulfilment of the mission of Jesus Christ towards the transformation and redemption of nations."/>
<meta property="og:image" content="http://www.irmevangelicalchurch.org/images/slider2.jpg"/>
<meta property="og:url" content="http://www.irmevangelicalchurch.org"/>

<?php else: ?>

<meta property="og:title" content="<?=$fbmeta_data['title']?>"/>
<meta property="og:site_name" content="IRM Evangelical Church"/>
<meta property="og:description" content="<?=$fbmeta_data['description']?>"/>
<?php if(!empty($fbmeta_data['image'])):?>
<meta property="og:image" content="<?=$fbmeta_data['image']?>"/>
<?php else: ?>
<meta property="og:image" content="http://www.irmevangelicalchurch.org/images/pdf_download.png"/>

<?php endif; ?>
<meta property="og:url" content="<?=$fbmeta_data['url']?>"/>


<?php endif; ?>