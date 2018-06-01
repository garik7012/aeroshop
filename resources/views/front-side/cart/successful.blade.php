@extends('layouts.main')

@section('breadcrumbs')
    <div class="col-xs-12">
        <div id="navBreadCrumb" class="breadcrumb">  <a class="home" href=""></a>
            <span> Checkout</span>
            <span> Success - Thank You</span>
        </div>
    </div>
@endsection

@section('content')
    <div class="centerColumn" id="checkoutSuccess">
        <!--bof -gift certificate- send or spend box-->
        <!--eof -gift certificate- send or spend box-->

        <div class="heading"><h1>Thank You! We Appreciate your Business!</h1></div>
        <div id="checkoutSuccessOrderNumber"><strong>Your Order Number is:</strong> {{$id}}</div>
        <div id="checkoutSuccessMainContent" class="content">
            <p><strong>Checkout Success Sample Text ...</strong></p>
            <p>A few words about the approximate shipping time or your processing policy would be put here. </p>
            <p>This section of text is from the Define Pages Editor located under Tools in the Admin.</p></div>
        <!-- bof payment-method-alerts -->
        <!-- eof payment-method-alerts -->
        <!--bof logoff-->
        <div id="checkoutSuccessLogoff">
            Thank you for shopping. Please click the Log Off link to ensure that your receipt and purchase information
            is not visible to the next person using this computer.
            <div class="buttonRow forward"><a
                        href="https://livedemo00.template-help.com/zencart_55417/index.php?main_page=logoff&amp;zenid=ob0ch2vq2sgrisn45b5st0t236"><span
                            class="cssButton normal_button button  button_logoff"
                            onmouseover="this.className='cssButtonHover normal_button button  button_logoff button_logoffHover'"
                            onmouseout="this.className='cssButton normal_button button  button_logoff'">&nbsp;Log Off&nbsp;</span></a>
            </div>
        </div>
        <!--eof logoff-->

        <!--bof -product notifications box-->
        <fieldset id="csNotifications">
            <legend>Please notify me of updates to these products</legend>
            <form role="form" name="order"
                  action="https://livedemo00.template-help.com/zencart_55417/index.php?main_page=checkout_success&amp;action=update&amp;zenid=ob0ch2vq2sgrisn45b5st0t236"
                  method="post"><input type="hidden" name="securityToken" value="cef5d11a6c410e4650f4c368dfc2cfc3">
                <input type="checkbox" name="notify[]" value="3" checked="checked" id="notify-0">&nbsp;&nbsp;<label
                        class="checkboxLabel" for="notify-0">Plumb Craft 6 Spray Setting Fixed Shower Head -
                    8674000</label>
                <br>
                <br>
                <input type="checkbox" name="notify[]" value="5" checked="checked" id="notify-1">&nbsp;&nbsp;<label
                        class="checkboxLabel" for="notify-1">Plumb Craft Toilet Tank Fill Valve</label>
                <br>
                <br>
                <input type="checkbox" name="notify[]" value="6" checked="checked" id="notify-2">&nbsp;&nbsp;<label
                        class="checkboxLabel" for="notify-2">Plumb Pak 12-in Brass Push Fit In-Line Straight
                    Valve</label>
                <br>
                <br>
                <input type="checkbox" name="notify[]" value="10" checked="checked" id="notify-3">&nbsp;&nbsp;<label
                        class="checkboxLabel" for="notify-3">Vigo One Handle Single Hole Pull Out Spray Kitchen
                    Faucet</label>
                <br>
                <br>
                <div class="buttonRow forward"><input type="submit" class="btn btn-success add-to-cart" value="Update">
                </div>
                <br>
                <br>
            </form>
        </fieldset>
        <!--eof -product notifications box-->


        <!--bof -product downloads module-->


        <!--eof -product downloads module-->

        <div id="checkoutSuccessOrderLink">You can view your order history by going to the <a
                    href="https://livedemo00.template-help.com/zencart_55417/index.php?main_page=account&amp;zenid=ob0ch2vq2sgrisn45b5st0t236"
                    name="linkMyAccount">My Account</a> page and by clicking on "View All Orders".
        </div>

        <div id="checkoutSuccessContactLink">Please direct any questions you have to <a
                    href="https://livedemo00.template-help.com/zencart_55417/index.php?main_page=contact_us&amp;zenid=ob0ch2vq2sgrisn45b5st0t236"
                    name="linkContactUs">customer service</a>.
        </div>

        <h3 id="checkoutSuccessThanks" class="centeredContent">Thanks for shopping with us online!</h3>
    </div>
@endsection