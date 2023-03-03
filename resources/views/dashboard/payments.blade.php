@extends('dashboard/layout')
@section('title')
OrderConstructor - daahboard/paymrnts
@endsection
@section('topmenu')
	@include('dashboard.topmenu')
@endsection
@section('sidebar')
	@include('dashboard.sidebar')
@endsection
@section('footer')
	@include('dashboard.footer')
@endsection
@section('main')
		<div class='BlockTitle pl-1'>
			<a href="{{ route('dashboard.payment') }}">PAYMENT</a>
        </div>
<form>
<div class="form-group">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="googlePayVersion" id="googlePayVersion1" value="version1" checked>
          <label class="form-check-label" for="googlePayVersion1">
            Version 1
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="googlePayVersion" id="googlePayVersion2" value="version2">
          <label class="form-check-label" for="googlePayVersion2">
            Version 2
          </label>
        </div>
      </div>
  <div class="mb-3">
    <label class="form-label">Chose Google Pay Api Version</label>
    <select class="form-select" name="version">
      <option value="">American Express</option>
      <option value="DISCOVER">Discover</option>
      <option value="JCB">JCB</option>
      <option value="MASTERCARD">Mastercard</option>
      <option value="VISA">Visa</option>
    </select>
  </div>
  <div class="mb-3">
    <label class="form-label">PAYMENY GATEWAU</label>
    <select class="form-select" name="payment_gateway">
		 <option value="">-- Select a payment provider --</option>
         <option value="2can&ibox">2can&amp;ibox</option>
         <option value="accept.blue">accept.blue</option>
         <option value="ACI">ACI</option>
         <option value="Acquired.com">Acquired.com</option>
         <option value="Adyen">Adyen</option>
         <option value="Airwallex">Airwallex</option>
         <option value="Alfa-Bank">Alfa-Bank</option>
         <option value="Anedot">Anedot</option>
         <option value="ApcoPay">ApcoPay</option>
         <option value="APPEX">APPEX</option>
         <option value="AsiaBill">AsiaBill</option>
         <option value="AsiaPay">AsiaPay</option>
         <option value="Assist">Assist</option>
         <option value="Assist Belarus">Assist Belarus</option>
         <option value="Aurus">Aurus</option>
         <option value="Authorize.Net">Authorize.Net</option>
         <option value="Axerve">Axerve</option>
         <option value="Bank 131">Bank 131</option>
         <option value="Bank Saint Petersburg">Bank Saint Petersburg</option>
         <option value="Bank Vostok">Bank Vostok</option>
         <option value="Barclaycard">Barclaycard</option>
         <option value="Barion">Barion</option>
         <option value="BCC.KZ">BCC.KZ</option>
         <option value="ВсеПлатежи">ВсеПлатежи</option>
         <option value="bePaid">bePaid</option>
         <option value="Billing Systems">Billing Systems</option>
         <option value="Bizzon">Bizzon</option>
         <option value="Blocks">Blocks</option>
         <option value="Bluefin">Bluefin</option>
         <option value="BlueGate (NTTData)">BlueGate (NTTData)</option>
         <option value="Blue Media">Blue Media</option>
         <option value="BlueSnap">BlueSnap</option>
         <option value="BPC">BPC</option>
         <option value="Braintree">Braintree</option>
         <option value="Braspag">Braspag</option>
         <option value="Buya">Buya</option>
         <option value="CardConnect">CardConnect</option>
         <option value="Cardknox">Cardknox</option>
         <option value="Cardstream">Cardstream</option>
         <option value="Cashflows">Cashflows</option>
         <option value="Cathay United Bank">Cathay United Bank</option>
         <option value="Cecabank">Cecabank</option>
         <option value="Celerispay">Celerispay</option>
         <option value="CellPoint Digital">CellPoint Digital</option>
         <option value="CentralPay">CentralPay</option>
         <option value="Chase Merchant Services">Chase Merchant Services</option>
         <option value="Checkout.com">Checkout.com</option>
         <option value="CityPay">CityPay</option>
         <option value="Cloud9 Payment Gateway (C9PG)">Cloud9 Payment Gateway (C9PG)</option>
         <option value="CloudPayments">CloudPayments</option>
         <option value="Computop">Computop</option>
         <option value="ConcordPay">ConcordPay</option>
         <option value="ConnexPay">ConnexPay</option>
         <option value="Corefy">Corefy</option>
         <option value="Credorax">Credorax</option>
         <option value="CrossPay">CrossPay</option>
         <option value="CSG Forte">CSG Forte</option>
         <option value="CTBC Bank">CTBC Bank</option>
         <option value="Cybersource">Cybersource</option>
         <option value="Datacap Systems, Inc.">Datacap Systems, Inc.</option>
         <option value="Datatrans">Datatrans</option>
         <option value="Deutsche Bank AG">Deutsche Bank AG</option>
         <option value="Deutsche Bank – Merchant Solutions">Deutsche Bank – Merchant Solutions</option>
         <option value="Digital Finance">Digital Finance</option>
         <option value="dLocal">dLocal</option>
         <option value="DNA Payments">DNA Payments</option>
         <option value="Dojo">Dojo</option>
         <option value="Dotpay">Dotpay</option>
         <option value="ECOMMPAY">ECOMMPAY</option>
         <option value="e-SiTef - Software Express">e-SiTef - Software Express</option>
         <option value="EasyPay">EasyPay</option>
         <option value="EBANX">EBANX</option>
         <option value="EBANX Pay">EBANX Pay</option>
         <option value="eCard">eCard</option>
         <option value="eGHL">eGHL</option>
         <option value="Elavon (Converge)">Elavon (Converge)</option>
         <option value="emerchantpay">emerchantpay</option>
         <option value="emspay">emspay</option>
         <option value="EpicPay">EpicPay</option>
         <option value="EveryPay">EveryPay</option>
         <option value="Evopay">Evopay</option>
         <option value="EVO Payments">EVO Payments</option>
         <option value="Exact Payments">Exact Payments</option>
         <option value="Fat Zebra">Fat Zebra</option>
         <option value="Fibonatix">Fibonatix</option>
         <option value="Finix">Finix</option>
         <option value="First Data (Payeezy)">First Data (Payeezy)</option>
         <option value="FIS Biller Solutions">FIS Biller Solutions</option>
         <option value="Fluid Pay">Fluid Pay</option>
         <option value="Fondy">Fondy</option>
         <option value="ForteBank">ForteBank</option>
         <option value="Freedom Finance Bank">Freedom Finance Bank</option>
         <option value="FreedomPay">FreedomPay</option>
         <option value="FreedomPay.Money">FreedomPay.Money</option>
         <option value="Freepay">Freepay</option>
         <option value="Frontstream">Frontstream</option>
         <option value="GBPayments">GBPayments</option>
         <option value="GETTRX">GETTRX</option>
         <option value="Global Payments">Global Payments</option>
         <option value="GMO Payment Gateway">GMO Payment Gateway</option>
         <option value="Good Idea Technologies">Good Idea Technologies</option>
         <option value="GoPay">GoPay</option>
         <option value="Gravity Payments">Gravity Payments</option>
         <option value="Halyk Bank">Halyk Bank</option>
         <option value="Helcim">Helcim</option>
         <option value="HIPS">HIPS</option>
         <option value="HiTrust">HiTrust</option>
         <option value="Hyp">Hyp</option>
         <option value="iCard">iCard</option>
         <option value="imoje">imoje</option>
         <option value="Impaya">Impaya</option>
         <option value="InPlat">InPlat</option>
         <option value="InstaMed">InstaMed</option>
         <option value="IntellectMoney">IntellectMoney</option>
         <option value="ioka fintech">ioka fintech</option>
         <option value="iPay.ua">iPay.ua</option>
         <option value="iPay88">iPay88</option>
         <option value="iQmetrix">iQmetrix</option>
         <option value="IXOPAY">IXOPAY</option>
         <option value="Judopay">Judopay</option>
         <option value="Kassa">Kassa</option>
         <option value="Kineox">Kineox</option>
         <option value="Limepay">Limepay</option>
         <option value="LiqPay">LiqPay</option>
         <option value="Littlepay">Littlepay</option>
         <option value="LogPay">LogPay</option>
         <option value="Loyale">Loyale</option>
         <option value="Lyra">Lyra</option>
         <option value="maib">MAIB</option>
         <option value="mandarin">Mandarin</option>
         <option value="mastercard-payment-gateway-services">Mastercard Payment Gateway Services</option>
         <option value="merchant-warrior">Merchant Warrior</option>
         <option value="mitec">MITEC</option>
         <option value="mixplat">MIXPLAT</option>
         <option value="mobi-money">MOBI.Money</option>
         <option value="modulbank">Modulbank</option>
         <option value="mondido">Mondido</option>
         <option value="monei">Monei</option>
         <option value="moneris">Moneris</option>
         <option value="money-mail-ru">Money.Mail.Ru</option>
         <option value="multicarta">Multicarta</option>
         <option value="multisafepay">MultiSafepay</option>
         <option value="mundipagg">Mundipagg</option>
         <option value="mycheck">MyCheck</option>
         <option value="mychoice2pay">MyChoice2Pay</option>
         <option value="mypos">myPOS</option>
         <option value="n-ts-group">N&TS GROUP</option>
         <option value="nccc">NCCC</option>
         <option value="neon-pay">Neon Pay</option>
         <option value="netopia">Netopia</option>
         <option value="newebpay">Newebpay (formerly STPath, Pay2Go)</option>
         <option value="nexi">Nexi</option>
         <option value="nmi">NMI</option>
         <option value="noon-payments">noon payments</option>
         <option value="novalnet">Novalnet</option>
         <option value="ntt-data">NTT DATA</option>
         <option value="nuvei">Nuvei</option>
         <option value="Oceanpayment">Oceanpayment</option>
         <option value="Omise">Omise</option>
         <option value="One Inc">One Inc</option>
         <option value="Onelya">Onelya</option>
         <option value="Onerway">Onerway</option>
         <option value="OnPay">OnPay</option>
         <option value="Oschadbank">Oschadbank</option>
         <option value="Paragon Payment Solutions">Paragon Payment Solutions</option>
         <option value="PayAnyWay">PayAnyWay</option>
         <option value="Payarc">Payarc</option>
         <option value="PAYCOMET">PAYCOMET</option>
         <option value="Paydock">Paydock</option>
         <option value="PayEase">PayEase</option>
         <option value="PayFabric">PayFabric</option>
         <option value="PayFacto">PayFacto</option>
         <option value="Paygent">Paygent</option>
         <option value="Payhub">Payhub</option>
         <option value="PayLane">PayLane</option>
         <option value="Payler">Payler</option>
         <option value="Payline (Monext)">Payline (Monext)</option>
         <option value="PayLink">PayLink</option>
         <option value="Payload">Payload</option>
         <option value="Paymark">Paymark</option>
         <option value="PayMaster">PayMaster</option>
         <option value="Payment Fusion">Payment Fusion</option>
         <option value="Paymentwall">Paymentwall</option>
         <option value="Paymetric">Paymetric</option>
         <option value="Paymo">Paymo</option>
         <option value="Paymtech">Paymtech</option>
         <option value="PayNearMe">PayNearMe</option>
         <option value="Payneteasy">Payneteasy</option>
         <option value="Pay.nl">Pay.nl</option>
         <option value="Paynopain">Paynopain</option>
         <option value="PayOnline">PayOnline</option>
         <option value="PayPlus">PayPlus</option>
         <option value="Payrexx">Payrexx</option>
         <option value="Payrix">Payrix</option>
         <option value="Paysafe">Paysafe</option>
         <option value="Paysend Business">Paysend Business</option>
         <option value="Paysoft">Paysoft</option>
         <option value="Pay360">Pay360</option>
         <option value="Paythru">Paythru</option>
         <option value="Payture">Payture</option>
         <option value="PayU">PayU</option>
         <option value="PayU India">PayU India</option>
         <option value="PayU Romania">PayU Romania</option>
         <option value="PayU Russia">PayU Russia</option>
         <option value="Payway">Payway</option>
         <option value="Pelecard">Pelecard</option>
         <option value="Pikassa">Pikassa</option>
         <option value="PingPong">PingPong</option>
         <option value="Pin Payments">Pin Payments</option>
         <option value="Planet">Planet</option>
         <option value="Plategka.com">Plategka.com</option>
         <option value="Platon">Platon</option>
         <option value="Pomelo">Pomelo</option>
         <option value="Portmone">Portmone</option>
         <option value="Primer">Primer</option>
         <option value="ProcessOut">ProcessOut</option>
         <option value="Przelewy24">Przelewy24</option>
         <option value="PSCB">PSCB</option>
         <option value="Qenta Payment CEE">Qenta Payment CEE</option>
         <option value="QIWI">QIWI</option>
         <option value="Qualpay">Qualpay</option>
         <option value="QuickPay">QuickPay</option>
         <option value="Qvalent">Qvalent</option>
         <option value="Radial">Radial</option>
         <option value="Rapyd">Rapyd</option>
         <option value="Razer Merchant Services">Razer Merchant Services (formerly MolPay)</option>
         <option value="RBK.money">RBK.money</option>
         <option value="RBS">RBS</option>
         <option value="Rebail Capital">Rebail Capital</option>
         <option value="Rebilly">Rebilly</option>
         <option value="RECON (Cityline Payment Service)">RECON (Cityline Payment Service)</option>
         <option value="Recurly">Recurly</option>
         <option value="Reddot">Reddot</option>
         <option value="Redsys">Redsys</option>
         <option value="Reepay">Reepay</option>
         <option value="Russian Standard Bank">Russian Standard Bank</option>
         <option value="Ryft">Ryft</option>
         <option value="Saferpay">Saferpay</option>
         <option value="Sberbank">Sberbank</option>
         <option value="Sense Bank">Sense Bank</option>
         <option value="SH Start High">SH Start High</option>
         <option value="Sipay">Sipay</option>
         <option value="Softbank Payment Service">Softbank Payment Service</option>
         <option value="Solid">Solid</option>
         <option value="Sony Payment Services">Sony Payment Services</option>
         <option value="Splitit">Splitit</option>
         <option value="Spreedly">Spreedly</option>
         <option value="Square">Square</option>
         <option value="Stancer">Stancer</option>
         <option value="Stripe">Stripe</option>
         <option value="Suntech">Suntech</option>
         <option value="Svea Bank">Svea Bank</option>
         <option value="TabaPay">TabaPay</option>
         <option value="TapPay (Cherri Tech)">TapPay (Cherri Tech)</option>
         <option value="TapPayments">TapPayments</option>
         <option value="tarlanpayments">tarlanpayments</option>
         <option value="TAS Link">TAS Link</option>
         <option value="Tatra banka (CardPay)">Tatra banka (CardPay)</option>
         <option value="TEKO">TEKO</option>
         <option value="theMAP">theMAP</option>
         <option value="Tinkoff">Tinkoff</option>
         <option value="TPay.com">TPay.com</option>
         <option value="Transact Campus">Transact Campus</option>
         <option value="Transaction Network Services">Transaction Network Services</option>
         <option value="Transpayrent">Transpayrent</option>
         <option value="Tranzila">Tranzila</option>
         <option value="Tranzzo">Tranzzo</option>
         <option value="Truevo">Truevo</option>
         <option value="TrustPay">TrustPay</option>
         <option value="Trust Payments">Trust Payments</option>
         <option value="Tuna">Tuna</option>
         <option value="UAPAY">UAPAY</option>
         <option value="UBRR">UBRR</option>
         <option value="UkrGasBank Pay">UkrGasBank Pay</option>
         <option value="Uniteller">Uniteller</option>
         <option value="Unitpay">Unitpay</option>
         <option value="Unlimint">Unlimint</option>
         <option value="Unzer Austria">Unzer Austria</option>
         <option value="UPC">UPC</option>
         <option value="USAePay">USAePay</option>
         <option value="Valitor">Valitor</option>
         <option value="Vantiv">Vantiv</option>
         <option value="Verestro">Verestro</option>
         <option value="Veritrans">Veritrans</option>
         <option value="Very Good Security">Very Good Security</option>
         <option value="Vindicia">Vindicia</option>
         <option value="Viva Wallet">Viva Wallet</option>
         <option value="Walletto">Walletto</option>
         <option value="WayForPay">WayForPay</option>
         <option value="WEAT">WEAT</option>
         <option value="WePay">WePay</option>
         <option value="WhenThen">WhenThen</option>
         <option value="Windcave">Windcave</option>
         <option value="Wirebank">Wirebank</option>
         <option value="Wirecard (Elastic Engine)">Wirecard (Elastic Engine)</option>
         <option value="Worldline (GlobalCollect)">Worldline (GlobalCollect)</option>
         <option value="Worldline - Ingenico">(WL Online Checkout)</option>
         <option value="Worldnet">Worldnet</option>
         <option value="Worldpay">Worldpay</option>
         <option value="Wpay">Wpay</option>
         <option value="WSPay">WSPay</option>
         <option value="ЮKassa">ЮKassa</option>
         <option value="Z-Credit">Z-Credit</option>
         <option value="ZEN.com">ZEN.com</option>
         <option value="Zeptto (formerly Paywax)">Zeptto (formerly Paywax)</option>
	</select>
  </div>
  <div class="mb-3">
    <label class="form-label">Merchant ID:</label>
    <input type="text" class="form-control" name="merchantId" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Merchant Name:</label>
    <input type="text" class="form-control" name="merchantName" required>
  </div>
  <div class="mb-3">
    <label class="form-label">environment</label>
    <input type="text" class="form-control" name="environment" required>
  </div>
  <div class="mb-3">
    <label class="form-label">API Key:</label>
    <input type="text" class="form-control" name="apiKey" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Allowed Card Networks:</label>
    <select class="form-select" name="allowedCardNetworks" multiple required>
      <option value="AMEX">American Express</option>
      <option value="DISCOVER">Discover</option>
      <option value="JCB">JCB</option>
      <option value="MASTERCARD">Mastercard</option>
      <option value="VISA">Visa</option>
    </select>
  </div>
  <div class="mb-3">
    <label class="form-label">Allowed Authentication Method:</label>
    <select class="form-select" name="allowedCardAuthMethods" multiple required>
      <option value="PAN_ONLY">Pan only</option>
      <option value="CRYPTOGRAM_3DS">Cryptogram 3DS</option>
    </select>
  </div>
  <div class="mb-3">
    <label class="form-label">total price status</label>
    <input type="text" class="form-control" name="TotalPriceStatus" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Curency Code</label>
    <input type="text" class="form-control" name="CurencyCode" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Country Code</label>
    <input type="text" class="form-control" name="CountryCode" required>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
@section('hint')
		<div class='col-lg-12 col-md-12 col-xs-12 HintTitle'>
			Hint
        </div>
		<div>
		    <ul>
			    <li>Create your business acount and get Merchant ID & Merchant Name
					<a href='https://goo.gle/33Tm7PT' class='hint'>Google Pay Business Console</a></li>
			</ul>
		</div>
@endsection
@section('guest')
GUEST
@endsection