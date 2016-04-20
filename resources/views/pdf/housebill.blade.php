<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <style type="text/css">
            .header_title {
                width: 100%;
                text-align: center;
                height: 16px;
                line-height: 16px;
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
            .content_1 {
                font-size: 14px;
                line-height: 14px;
            }
            .content_2 {
                font-size: 9px;
            }
            .height-80 {
                height: 80px;
            }
            .height-30 {
                height: 16px;
            }
            .height-60 {
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
        <h4 class="header_title pbn mtn mbn">Ocean Bill of Lading</h4>
        <p class="header_title header_subtitle ptn">(not negotiable unless consigned to order)</p>
        <table class="bdt">
            <tr>
                <td>
                    <table>
                        <tr>
                            <td class="bdb height-80" colspan="3">
                                <p class="caption_1">Shipper</p>
                                <p class="content_1">LIEN A CO., LTD.<br/>55/1A KHUONG VIET STREET, PHU TRUNG WARD,<br/>TAN PHU DISTRICT, HO CHI MINH CITY, VIETNAM</p>
                            </td>
                        </tr>
                        <tr>
                            <td class="bdb height-80" colspan="3">
                                <p class="caption_1">Consignee</p>
                                <p class="content_1">PHIL. AUSTRALIAN BRASS BED<br/>11 2ND AVE., STA MARIA IND.ESTATE, BAGUMBAYAN TAGUIG CITY, PHILIPPINES 1631</p>
                            </td>
                        </tr>
                        <tr>
                            <td class="bdb height-80" colspan="3">
                                <p class="caption_1">Notify Party</p>
                                <p class="content_1">SAME AS CNEE</p>
                            </td>
                        </tr>
                        <tr>
                            <td class="bdb bdr" colspan="2">
                                <p class="caption_1">Pre-carriage by</p>
                                <p class="content_1 height-30">Some text</p>
                            </td>
                            <td class="bdb">
                                <p class="caption_1">Place of receipt</p>
                                <p class="content_1">HO CHI MINH, VIETNAM</p>
                            </td>
                        </tr>
                        <tr>
                            <td class="bdb bdr" width="23%">
                                <p class="caption_1">Ocean Vessel</p>
                                <p class="content_1 height-30">BALTIC STRAIT</p>
                            </td>
                            <td class="bdb bdr" width="8%">
                                <p class="caption_1">Voy. No</p>
                                <p class="content_1">044B</p>
                            </td>
                            <td class="bdb" width="25%">
                                <p class="caption_1">Port of loading</p>
                                <p class="content_1">HO CHI MINH (CAT LAI)</p>
                            </td>
                        </tr>
                        <tr>
                            <td class="bdb bdr">
                                <p class="caption_1">Port of discharge</p>
                                <p class="content_1 height-60">MANILA NORTH HARBOUR</p>
                            </td>
                            <td class="bdb bdr"></td>
                            <td class="bdb">
                                <p class="caption_1">Place of Delivery</p>
                                <p class="content_1">MANILA, METRO MANILA, PHILIPPINES</p>
                            </td>
                        </tr>
                    </table>
                </td>
                <td class="bdl bdb pl2" width="44%">
                    <h3>PHUC LOC FORWARDING CO.</h3>
                    <p class="content_2">RECEIVED by the carrier the goods as specified above in apparent good order and condition unless otherwise stated, to be transported to such place as agreed, authorised or permitted herein and subject to all the terms and conditions appearing on the front and reverse of this Bill of Lading to which the Merchant agrees by accepting this Bill of Lading any local privileges and customs notwithstanding. The particular given above as stated by the shipper and the weight, measure, quantity, condition, contents and value of the goods are unknown to the Carrier.</p>
                    <p class="content_2">Note:</p>
                    <p class="content_2">The Merchant's attention is called to the fact that according to clause 10,11 and 12 of this Bill of Lading, the liability of the Carrier is, in most cases, limited in respect of the loss of or damage to the goods and delay.</p>
                    <p class="content_2">LAW AND JURISDICTION CLAUSE</p>
                    <p class="content_2">The contract evidenced by or contained in this Bill of Lading shall be governed by the law of the Singapore and any claim or dispute arising hereunder or in connection herewith shall (without prejusdice to the Carrier's right to commence proceeding in any other jurisdiction) be subject to the jurisdiction of the Courts of Singapore.</p>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="font-size-9" width="3%">
                    <div class="rotate270"><p>Particulars furnished by Shipper</p></td></div>
                <td width="30%">
                    <p>Marks & Nos.</p>
                    <p>FCL/FCL</p>
                    <p>CONT/SEAL NO:</p>
                    <p>TUCKU1491975/DLU6721</p>

                    <p>N/M</p>
                </td>
                <td width="10%">
                    <p>Quantity</p>
                    <p>98 PACKAGES</p>
                    <p>1X20GP</p>
                </td>
                <td width="37%">
                    <p>Kind of packages; Description of goods</p>
                    <p>"SHIPPER'S COUNT, LOAD, STOWAGE AND SEAL"</p>
                    <p>LATEX MATTRESS - DENSITY 75KGS/M3</p>
                    <p>NET WEIGHT: 1954.730 KGS</p>
                    <p>SHIPPED ON BOARD:</p>
                    <p>12-MAY-2015</p>
                    <p>"FREIGHT COLLECT"</p>
                    <p>TOTAL: ONE (01X20GP) CONTAINER ONLY</p>
                </td>
                <td width="10%">
                    <p>Gross weight</p>
                    <p>1,993.930 KGS</p>
                </td>
                <td width="10%">
                    <p>Measurement</p>
                    <p>26.060 CBM</p>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td rowspan="3" colspan="3">
                    <p></p>
                    <p>MACOLINE FREIGHT FORWARDING SERVICES UNIT 1710 17TH FLOOR CITY LAND HERRERA TOWER 98 V.A RUFINO CORNER VALERO STREET SALCEDO VILLAGE MAKATI CITY 1227 PHILIPPINES</p>
                    <p>TEL.NO.: +632-844-1971 / 843-1105</p>
                    <p>FAX NO.: +632-843-1767</p>
                </td>
                <td>
                    <p>IN WITNESS whereof the original Bills of Lading stated opposite have been issued one of which being accomplished the other(s) to be void</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Place and date of issue</p>
                    <p>HOCHIMINH CITY, MAY 12, 2015</p>
                </td>
            </tr>
            <tr>
                <td>Signed on behalf of the Carrier</td>
            </tr>
            <tr>
                <td>Freight and Charge</td>
                <td>Prepaid</td>
                <td>Collect</td>
                <td>PHUCLOC FORWARDING CO.</td>
            </tr>
            <tr>
                <td>"FREIGHT COLLECT"</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
        </table>
    </body>
</html>