<HTML>
    <HEAD>
        <META CONTENT="text/html; charset=ISO-8859-1" HTTP-EQUIV="Content-Type" />
        <TITLE><?php echo e($title ?? 'Cruiz Auto Reports'); ?></TITLE>
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet"> 
        <link rel="stylesheet" href="<?php echo e(asset('css/jquery-ui.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('css/semantic.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('css/Semantic-UI-Alert.css')); ?>">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css">
        <STYLE TYPE="text/css">
            TABLE,
            TD,
            TH {
                border-style: solid;
                border-color: black;
            }
    
            TD,
            TH {
                background: white;
                margin: 0;
                line-height: 100%;
                padding-left: 0.5em;
                padding-right: 0.5em;
            }
    
            TD {
                border-width: 0 1px 0 0;
            }
    
            TH {
                border-width: 1px 1px 1px 0;
            }
    
            TR TD.h {
                color: red;
            }
    
            TABLE {
                border-spacing: 0;
                border-collapse: collapse;
                border-width: 0 0 1px 1px;
            }
    
            P,
            H1,
            H2,
            H3,
            TH {
                font-family: verdana, arial, sans-serif;
                font-size: 10pt;
            }
    
            TD {
                font-family: courier, monospace;
                font-size: 10pt;
            }
    
            TABLE.hdft {
                border-spacing: 0;
                border-collapse: collapse;
                border-style: none;
            }
    
            TABLE.hdft TH,
            TABLE.hdft TD {
                border-style: none;
                line-height: normal;
            }
    
            TABLE.hdft TH.tl,
            TABLE.hdft TD.tl {
                background: #6699CC;
                color: white;
            }
    
            TABLE.hdft TD.nv {
                background: #6633DD;
                color: white;
            }
    
            .nv A:link {
                color: white;
            }
    
            .nv A:visited {
                color: white;
            }
    
            .nv A:active {
                color: yellow;
            }
    
            TABLE.hdft A:link {
                color: white;
            }
    
            TABLE.hdft A:visited {
                color: white;
            }
    
            TABLE.hdft A:active {
                color: yellow;
            }
    
            .in {
                color: #356085;
            }
    
            TABLE.s TD {
                padding-left: 0.25em;
                padding-right: 0.25em;
            }
    
            TABLE.s TD.l {
                padding-left: 0.25em;
                padding-right: 0.25em;
                text-align: right;
                background: #F0F0F0;
            }
    
            TABLE.s TR.z TD {
                background: #FF9999;
            }
    
            TABLE.s TR.p TD {
                background: #FFFF88;
            }
    
            TABLE.s TR.c TD {
                background: #CCFFCC;
            }
    
            A:link {
                color: #0000EE;
                text-decoration: none;
            }
    
            A:visited {
                color: #0000EE;
                text-decoration: none;
            }
    
            A:hover {
                color: #0000EE;
                text-decoration: underline;
            }
    
            TABLE.cn {
                border-width: 0 0 1px 0;
            }
    
            TABLE.s {
                border-width: 1px 0 1px 1px;
            }
    
            TD.h {
                color: red;
                border-width: 0 1px 0 0;
            }
    
            TD.f {
                border-width: 0 1px 0 1px;
            }
    
            TD.hf {
                color: red;
                border-width: 0 1px 0 1px;
            }
    
            TH.f {
                border-width: 1px 1px 1px 1px;
            }
    
            TR.cis TD {
                background: #F0F0F0;
            }
    
            TR.cis TD {
                border-width: 1px 1px 1px 0;
            }
    
            TR.cis TD.h {
                color: red;
                border-width: 1px 1px 1px 0;
            }
    
            TR.cis TD.f {
                border-width: 1px 1px 1px 1px;
            }
    
            TR.cis TD.hf {
                color: red;
                border-width: 1px 1px 1px 1px;
            }
    
            TD.b {
                border-style: none;
                background: transparent;
                line-height: 50%;
            }
    
            TD.bt {
                border-width: 1px 0 0 0;
                background: transparent;
                line-height: 50%;
            }
    
            TR.o TD {
                background: #F0F0F0;
            }
    
            TABLE.it {
                border-style: none;
            }
    
            TABLE.it TD,
            TABLE.it TH {
                border-style: none;
            }
    
            BUTTON {
                margin-top: 1rem;
            }
    
            BODY {
                padding-left: 2rem;
                padding-right: 2rem;
                padding-top: 1rem;
            }
    
        </STYLE>
    </HEAD>
    
    <BODY>
        <div id="pdf">
        <div style="margin-bottom:20px">
            <img src="/logo.png" width="150">
        </div>
        
        <?php echo $__env->yieldContent('content'); ?>

        </div>

        <br>
        <P align="right">
            <button class="ui button red" 
            onclick="printJS({
                printable:'pdf', 
                type:'html',
                css:'/css/styles.css'})">
                Download/Print PDF</button>
        </P>

        <script src="<?php echo e(asset('js/app.js')); ?>"></script>
        <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/semantic.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/jquery-ui.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/Semantic-UI-Alert.js')); ?>"></script>
        <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>

        <?php echo $__env->yieldContent("js"); ?>

    </BODY>
    
    </HTML><?php /**PATH /home/nya/Downloads/Compressed/copy-car-rental-master/resources/views/reports/layout.blade.php ENDPATH**/ ?>