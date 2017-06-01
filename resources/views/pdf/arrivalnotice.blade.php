<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ $fileName }}</title>
        <meta charset="utf-8">
        <style type="text/css">
            .header_title {
                width: 100%;
                text-align: center;
                height: 16px;
                line-height: 16px;
                font-size: 16px;
            }
            h3 {
                text-align: center;
                font-size: 16px;
            }
            table {
                border-collapse: collapse;
            }
            .pull-left {
                float: left;
            }
            .height-200 {
                height: 200px !important;
            }
            .header_subtitle {
                font-size: 6px;
                height: 8px;
                line-height: 6px;
            }
            .font-size-9 {
                font-size: 9px;
            }
            .ptn {
                padding-top: 0 !important;
            }
            .pbn {
                padding-bottom: 0 !important;
            }
            .mtn {
                margin-top: 0 !important;
            }
            .mbn {
                margin-bottom: 0 !important;
            }
            .bdt {
                border-top: solid 1px;
            }
            .bdr {
                border-right: solid 1px;
            }
            .bdl {
                border-left: solid 1px;
            }
            .bdb {
                border-bottom: solid 1px;
            }
            td {
                text-align: left;
                vertical-align: top;
                margin: 0;
                padding: 0 0 0 3px;
            }
            td > p{
                float:left;
                width: 100%;
                min-height: 14px;
            }
            p {
                margin: 0;
                padding: 0;
            }
            .caption_1 {
                font-size: 10px;
            }
            .caption_2 {
                font-size: 11px;
            }
            .content_1 {
                font-size: 13px;
                line-height: 13px;
            }
            .content_2 {
                font-size: 9px;
            }
            .height-80 {
                height: 80px;
            }
            .height-90 {
                height: 90px;
            }
            .height-30 {
                height: 16px;
            }
            .height-40 {
                height: 40px !important;
            }
            .pl2 {
                padding-left: 2px;
            }
            /*  Rotate  */
            .rotate90{
                -ms-transform: rotate(90deg); /* IE 9 */
                -webkit-transform: rotate(90deg); /* Chrome, Safari, Opera */
                transform: rotate(90deg);
            }
            
            div.rotate270 {
                /* Something you can count on */
                width: 20px;
                float: left;
                transform: 
                    /* Magic Numbers */
                    translate(0, 150px)
                    /* 90 is really 360 - 90 */
                    rotate(270deg);
                -webkit-transform: translate(0, 150px) rotate(270deg);
                position: relative;
                height:15px;
            }

            div.rotate270 > p {
               white-space: nowrap;
                position: absolute;
                top:0;
                left:0;
            }
        </style>
    </head>
    <body @if($test) 
           style="width: 792px; margin: auto;"
           @endif
           >
           <div>I'm arrival notice</div>
    </body>
</html>