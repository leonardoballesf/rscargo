<!-- Begin: Content -->
<section id="content" class="table-layout animated fadeIn">

        <!-- begin: .tray-center -->
        <div class="tray tray-center">
          <!-- create new order panel -->
          <div class="panel mb25 mt5">
            <div class="panel-heading">
                <i class="panel-title pull-right btn btn-rounded icon-zoom2 icon-admin2" style="font-size:24px"></i>              
              <ul class="nav panel-tabs-border panel-tabs panel-tabs-left">
                <li class="active">
                  <a href="#tab_basic" data-toggle="tab">Datos Básicos</a>
                </li>
                <li>
                  <a href="#tab_setting" data-toggle="tab">Ubicación</a>
                </li>
                <li>
                  <a href="#tab_security" data-toggle="tab">Seguridad</a>
                </li>
              </ul>
            </div>
            <div class="panel-body p20 pb10">
              <div class="tab-content pn br-n admin-form">
                <div id="tab_basic" class="tab-pane active">

                  <div class="section row mbn">
                    <div class="col-md-12 pl15">
                      <div class="section row mb15">
                        <div class="col-xs-6">
                          <label for="sellers_name" class="field prepend-icon">
                            <input type="text" name="sellers_name" id="sellers_name" class="event-name gui-input br-light light" placeholder="Nombre(s)">
                            <label for="sellers_name" class="field-icon">
                              <i class="fa fa-user"></i>
                            </label>
                          </label>
                        </div>
                        <div class="col-xs-6">
                          <label for="sellers_lastname" class="field prepend-icon">
                            <input type="text" name="sellers_lastname" id="sellers_lastname" class="event-name gui-input br-light light" placeholder="Apellido(s)">
                            <label for="sellers_lastname" class="field-icon">
                              <i class="fa fa-user"></i>
                            </label>
                          </label>
                        </div>
                      </div>
                      <div class="section row mb15">
                          
                        <div class="col-xs-6">
                          <label for="sellers_identification" class="field prepend-icon">
                            <input type="text" name="sellers_identification" id="sellers_lastname" class="event-name gui-input br-light light" placeholder="Documento de Identificación">
                            <label for="sellers_identification" class="field-icon">
                              <i class="fa fa-user"></i>
                            </label>
                          </label>
                        </div>
                          
                      </div>
                      <div class="section mb15">
                        <label for="email" class="field prepend-icon">
                          <input type="text" name="email" id="email" class="event-name gui-input br-light bg-light" placeholder="Correo Electrónico">
                          <label for="email" class="field-icon">
                            <i class="fa fa-envelope-o"></i>
                          </label>
                        </label>
                      </div>

                    </div>
                    
                  </div>
                  <!-- end section row -->

                </div>
                <div id="tab_setting" class="tab-pane">

                  <div class="section row mbn">
                    <div class="col-xs-6 pr15">
                      <div class="section mb10">
                        <label for="cust-phone" class="field prepend-icon">
                          <input type="text" name="cust-phone" id="cust-phone" class="event-name gui-input bg-light br-light" placeholder="Customer Phone Number...">
                          <label for="cust-phone" class="field-icon">
                            <i class="fa fa-phone"></i>
                          </label>
                        </label>
                      </div>
                      <div class="section mb10">
                        <label for="customer-group" class="field select">
                          <select id="customer-group" name="customer-group">
                            <option value="0" selected="selected">Customer Group...</option>
                            <option value="1">Vendor</option>
                            <option value="2">Supplier</option>
                            <option value="3">Distributor</option>
                          </select>
                          <i class="arrow double"></i>
                        </label>
                      </div>
                      <div class="section">
                        <label for="customer-language" class="field select">
                          <select id="customer-language" name="customer-language">
                            <option value="0" selected="selected">Customer Language...</option>
                            <option value="1">English</option>
                            <option value="2">Spanish</option>
                            <option value="3">German</option>
                          </select>
                          <i class="arrow double"></i>
                        </label>
                      </div>
                    </div>
                    <div class="col-xs-6">
                      <label class="field option">
                        <input type="checkbox" name="info">
                        <span class="checkbox mr10"></span> Customer is Tax Exempt
                      </label>
                      <br>
                      <label class="field option mt15">
                        <input type="checkbox" name="info">
                        <span class="checkbox mr10"></span> Customer Accepts Marketing
                      </label>
                      <br>
                      <label class="field option mt15">
                        <input type="checkbox" name="info">
                        <span class="checkbox mr10"></span> Activate/Enable Account?
                      </label>
                      <hr class="alt short mv15">
                      <p class="text-muted">
                        <span class="fa fa-exclamation-circle text-warning fs15 pr5"></span> Grants the customer limited store access.</p>
                    </div>
                  </div>

                  <hr class="short alt mtn">

                  <div class="section mb15">
                    <label class="field prepend-icon">
                      <textarea class="gui-textarea br-light bg-light" id="cust-note" name="cust-note" placeholder="Customer Notes"></textarea>
                      <label for="cust-note" class="field-icon">
                        <i class="fa fa-edit"></i>
                      </label>
                    </label>
                  </div>
                  <!-- end section -->

                </div>
                <div id="tab_security" class="tab-pane">

                  <div class="section">
                    <label for="lastaddr" class="field prepend-icon">
                      <input type="text" name="lastaddr" id="lastaddr" class="gui-input" placeholder="Street address">
                      <label for="lastaddr" class="field-icon">
                        <i class="fa fa-map-marker"></i>
                      </label>
                    </label>
                  </div>
                  <!-- end section -->

                  <div class="section">
                    <label class="field select">
                      <select id="location" name="location">
                        <option value="">Select country...</option>
                        <option value="AL">Albania</option>
                        <option value="DZ">Algeria</option>
                        <option value="AD">Andorra</option>
                        <option value="AO">Angola</option>
                        <option value="AI">Anguilla</option>
                        <option value="AG">Antigua and Barbuda</option>
                        <option value="AR">Argentina</option>
                        <option value="AM">Armenia</option>
                        <option value="AW">Aruba</option>
                        <option value="AU">Australia</option>
                        <option value="AT">Austria</option>
                        <option value="AZ">Azerbaijan Republic</option>
                        <option value="BS">Bahamas</option>
                        <option value="BH">Bahrain</option>
                        <option value="BB">Barbados</option>
                        <option value="BE">Belgium</option>
                        <option value="BZ">Belize</option>
                        <option value="BJ">Benin</option>
                        <option value="BM">Bermuda</option>
                        <option value="BT">Bhutan</option>
                        <option value="BO">Bolivia</option>
                        <option value="BA">Bosnia and Herzegovina</option>
                        <option value="BW">Botswana</option>
                        <option value="BR">Brazil</option>
                        <option value="BN">Brunei</option>
                        <option value="BG">Bulgaria</option>
                        <option value="BF">Burkina Faso</option>
                        <option value="BI">Burundi</option>
                        <option value="KH">Cambodia</option>
                        <option value="CA">Canada</option>
                        <option value="CV">Cape Verde</option>
                        <option value="KY">Cayman Islands</option>
                        <option value="TD">Chad</option>
                        <option value="CL">Chile</option>
                        <option value="C2">China Worldwide</option>
                        <option value="CO">Colombia</option>
                        <option value="KM">Comoros</option>
                        <option value="CK">Cook Islands</option>
                        <option value="CR">Costa Rica</option>
                        <option value="HR">Croatia</option>
                        <option value="CY">Cyprus</option>
                        <option value="CZ">Czech Republic</option>
                        <option value="CD">Democratic Republic of the Congo</option>
                        <option value="DK">Denmark</option>
                        <option value="DJ">Djibouti</option>
                        <option value="DM">Dominica</option>
                        <option value="DO">Dominican Republic</option>
                        <option value="EC">Ecuador</option>
                        <option value="EG">Egypt</option>
                        <option value="SV">El Salvador</option>
                        <option value="ER">Eritrea</option>
                        <option value="EE">Estonia</option>
                        <option value="ET">Ethiopia</option>
                        <option value="FK">Falkland Islands</option>
                        <option value="FO">Faroe Islands</option>
                        <option value="FJ">Fiji</option>
                        <option value="FI">Finland</option>
                        <option value="FR">France</option>
                        <option value="GF">French Guiana</option>
                        <option value="PF">French Polynesia</option>
                        <option value="GA">Gabon Republic</option>
                        <option value="GM">Gambia</option>
                        <option value="GE">Georgia</option>
                        <option value="DE">Germany</option>
                        <option value="GI">Gibraltar</option>
                        <option value="GR">Greece</option>
                        <option value="GL">Greenland</option>
                        <option value="GD">Grenada</option>
                        <option value="GP">Guadeloupe</option>
                        <option value="GT">Guatemala</option>
                        <option value="GN">Guinea</option>
                        <option value="GW">Guinea Bissau</option>
                        <option value="GY">Guyana</option>
                        <option value="HN">Honduras</option>
                        <option value="HK">Hong Kong</option>
                        <option value="HU">Hungary</option>
                        <option value="IS">Iceland</option>
                        <option value="IN">India</option>
                        <option value="ID">Indonesia</option>
                        <option value="IE">Ireland</option>
                        <option value="IL">Israel</option>
                        <option value="IT">Italy</option>
                        <option value="JM">Jamaica</option>
                        <option value="JP">Japan</option>
                        <option value="JO">Jordan</option>
                        <option value="KZ">Kazakhstan</option>
                        <option value="KE">Kenya</option>
                        <option value="KI">Kiribati</option>
                        <option value="KW">Kuwait</option>
                        <option value="KG">Kyrgyzstan</option>
                        <option value="LA">Laos</option>
                        <option value="LV">Latvia</option>
                        <option value="LS">Lesotho</option>
                        <option value="LI">Liechtenstein</option>
                        <option value="LT">Lithuania</option>
                        <option value="LU">Luxembourg</option>
                        <option value="MG">Madagascar</option>
                        <option value="MW">Malawi</option>
                        <option value="MY">Malaysia</option>
                        <option value="MV">Maldives</option>
                        <option value="ML">Mali</option>
                        <option value="MT">Malta</option>
                        <option value="MH">Marshall Islands</option>
                        <option value="MQ">Martinique</option>
                        <option value="MR">Mauritania</option>
                        <option value="MU">Mauritius</option>
                        <option value="YT">Mayotte</option>
                        <option value="MX">Mexico</option>
                        <option value="FM">Micronesia</option>
                        <option value="MN">Mongolia</option>
                        <option value="MS">Montserrat</option>
                        <option value="MA">Morocco</option>
                        <option value="MZ">Mozambique</option>
                        <option value="NA">Namibia</option>
                        <option value="NR">Nauru</option>
                        <option value="NP">Nepal</option>
                        <option value="NL">Netherlands</option>
                        <option value="AN">Netherlands Antilles</option>
                        <option value="NC">New Caledonia</option>
                        <option value="NZ">New Zealand</option>
                        <option value="NI">Nicaragua</option>
                        <option value="NE">Niger</option>
                        <option value="NU">Niue</option>
                        <option value="NF">Norfolk Island</option>
                        <option value="NO">Norway</option>
                        <option value="OM">Oman</option>
                        <option value="PW">Palau</option>
                        <option value="PA">Panama</option>
                        <option value="PG">Papua New Guinea</option>
                        <option value="PE">Peru</option>
                        <option value="PH">Philippines</option>
                        <option value="PN">Pitcairn Islands</option>
                        <option value="PL">Poland</option>
                        <option value="PT">Portugal</option>
                        <option value="QA">Qatar</option>
                        <option value="CG">Republic of the Congo</option>
                        <option value="RE">Reunion</option>
                        <option value="RO">Romania</option>
                        <option value="RU">Russia</option>
                        <option value="RW">Rwanda</option>
                        <option value="KN">Saint Kitts and Nevis Anguilla</option>
                        <option value="PM">Saint Pierre and Miquelon</option>
                        <option value="VC">Saint Vincent and Grenadines</option>
                        <option value="WS">Samoa</option>
                        <option value="SM">San Marino</option>
                        <option value="ST">São Tomé and Príncipe</option>
                        <option value="SA">Saudi Arabia</option>
                        <option value="SN">Senegal</option>
                        <option value="RS">Serbia</option>
                        <option value="SC">Seychelles</option>
                        <option value="SL">Sierra Leone</option>
                        <option value="SG">Singapore</option>
                        <option value="SK">Slovakia</option>
                        <option value="SI">Slovenia</option>
                        <option value="SB">Solomon Islands</option>
                        <option value="SO">Somalia</option>
                        <option value="ZA">South Africa</option>
                        <option value="KR">South Korea</option>
                        <option value="ES">Spain</option>
                        <option value="LK">Sri Lanka</option>
                        <option value="SH">St. Helena</option>
                        <option value="LC">St. Lucia</option>
                        <option value="SR">Suriname</option>
                        <option value="SJ">Svalbard and Jan Mayen Islands</option>
                        <option value="SZ">Swaziland</option>
                        <option value="SE">Sweden</option>
                        <option value="CH">Switzerland</option>
                        <option value="TW">Taiwan</option>
                        <option value="TJ">Tajikistan</option>
                        <option value="TZ">Tanzania</option>
                        <option value="TH">Thailand</option>
                        <option value="TG">Togo</option>
                        <option value="TO">Tonga</option>
                        <option value="TT">Trinidad and Tobago</option>
                        <option value="TN">Tunisia</option>
                        <option value="TR">Turkey</option>
                        <option value="TM">Turkmenistan</option>
                        <option value="TC">Turks and Caicos Islands</option>
                        <option value="TV">Tuvalu</option>
                        <option value="UG">Uganda</option>
                        <option value="UA">Ukraine</option>
                        <option value="AE">United Arab Emirates</option>
                        <option value="GB">United Kingdom</option>
                        <option value="US">United States</option>
                        <option value="UY">Uruguay</option>
                        <option value="VU">Vanuatu</option>
                        <option value="VA">Vatican City State</option>
                        <option value="VE">Venezuela</option>
                        <option value="VN">Vietnam</option>
                        <option value="VG">Virgin Islands (British)</option>
                        <option value="WF">Wallis and Futuna Islands</option>
                        <option value="YE">Yemen</option>
                        <option value="ZM">Zambia</option>
                      </select>
                      <i class="arrow double"></i>
                    </label>
                  </div>
                  <!-- end section -->

                  <div class="section row">
                    <div class="col-md-3">
                      <label for="zip" class="field prepend-icon">
                        <input type="text" name="zip" id="zip" class="gui-input" placeholder="Zip">
                        <label for="zip" class="field-icon">
                          <i class="fa fa-certificate"></i>
                        </label>
                      </label>
                    </div>
                    <!-- end section -->

                    <div class="col-md-4">
                      <label for="city" class="field prepend-icon">
                        <input type="text" name="city" id="city" class="gui-input" placeholder="City">
                        <label for="city" class="field-icon">
                          <i class="fa fa-building-o"></i>
                        </label>
                      </label>
                    </div>
                    <!-- end section -->

                    <div class="col-md-5">
                      <label for="states" class="field select">
                        <select id="states" name="states">
                          <option value="">Choose state</option>
                          <option value="AL">Alabama</option>
                          <option value="AK">Alaska</option>
                          <option value="AZ">Arizona</option>
                          <option value="AR">Arkansas</option>
                          <option value="CA">California</option>
                          <option value="CO">Colorado</option>
                          <option value="CT">Connecticut</option>
                          <option value="DE">Delaware</option>
                          <option value="DC">District Of Columbia</option>
                          <option value="FL">Florida</option>
                          <option value="GA">Georgia</option>
                          <option value="HI">Hawaii</option>
                          <option value="ID">Idaho</option>
                          <option value="IL">Illinois</option>
                          <option value="IN">Indiana</option>
                          <option value="IA">Iowa</option>
                          <option value="KS">Kansas</option>
                          <option value="KY">Kentucky</option>
                          <option value="LA">Louisiana</option>
                          <option value="ME">Maine</option>
                          <option value="MD">Maryland</option>
                          <option value="MA">Massachusetts</option>
                          <option value="MI">Michigan</option>
                          <option value="MN">Minnesota</option>
                          <option value="MS">Mississippi</option>
                          <option value="MO">Missouri</option>
                          <option value="MT">Montana</option>
                          <option value="NE">Nebraska</option>
                          <option value="NV">Nevada</option>
                          <option value="NH">New Hampshire</option>
                          <option value="NJ">New Jersey</option>
                          <option value="NM">New Mexico</option>
                          <option value="NY">New York</option>
                          <option value="NC">North Carolina</option>
                          <option value="ND">North Dakota</option>
                          <option value="OH">Ohio</option>
                          <option value="OK">Oklahoma</option>
                          <option value="OR">Oregon</option>
                          <option value="PA">Pennsylvania</option>
                          <option value="RI">Rhode Island</option>
                          <option value="SC">South Carolina</option>
                          <option value="SD">South Dakota</option>
                          <option value="TN">Tennessee</option>
                          <option value="TX">Texas</option>
                          <option value="UT">Utah</option>
                          <option value="VT">Vermont</option>
                          <option value="VA">Virginia</option>
                          <option value="WA">Washington</option>
                          <option value="WV">West Virginia</option>
                          <option value="WI">Wisconsin</option>
                          <option value="WY">Wyoming</option>
                        </select>
                        <i class="arrow double"></i>
                      </label>
                    </div>
                    <!-- end .col8 section -->

                  </div>
                  <!-- end section row section -->

                  <div class="section row mbn">
                    <div class="col-sm-8">
                      <label class="field option mt10">
                        <input type="checkbox" name="info" checked>
                        <span class="checkbox"></span>Save Customer
                        <em class="small-text text-muted">- A Random Unique ID will be generated</em>
                      </label>
                    </div>
                    <div class="col-sm-4">
                      <p class="text-right">
                        <button class="btn btn-primary" type="button">Save Order</button>
                      </p>
                    </div>
                  </div>
                  <!-- end section -->
                </div>
              </div>
            </div>
          </div>

        <!-- recent activity table -->
          <div class="panel">
            <div class="panel-heading">
              <span class="panel-title hidden-xs">CATÁLOGO DE ÁRTICULOS</span>
            </div>
             
            <div class="panel-body pn ">
              <div class="table-responsive ">
                  <table id="catalogtable" class="table table-striped table-hover dataTable no-footer fs12">
                  <thead>
                    <tr class="bg-light">
                      <th class="text-center bg-danger">ID</th>
                      <th class="text-center bg-danger">CÓDIGO</th>
                      <th class="text-center bg-danger">DESCRIPCIÓN</th>
                      <th class="text-center bg-danger">CATEGORIA</th>
                      <th class="text-center bg-danger">ESTATUS</th>                      
                      <th class="text-center sorting_disabled bg-danger">OPCIONES</th>

                    </tr>
                  </thead>
                  <tbody class="text-uppercase">
                  
                  </tbody>
                </table>
              </div>
                <?php  //print('<pre>');print_r( $this->catalogCategory);print('</pre>');?>
            </div>
          </div>

        </div>
        <!-- end: .tray-center -->

        <!-- begin: .tray-right -->
        <aside class="tray tray-right tray300">
            
        <div class="panel panel-danger panel-border top mb15">
              <div class="panel-heading">
                <span class="panel-title text-uppercase text-center">Filtrado de Árticulos</span>
              </div>
        </div>            

          <!-- menu quick links -->
          <div class="admin-form">


            <form name="catalog_filters" id="catalog_filters" >
            
            <div class="section mb10">
              <label for="catalog_code" class="field prepend-icon">
                <input type="text" name="catalog_code" id="catalog_code" class="gui-input" placeholder="Código #">
                <label for="catalog_code" class="field-icon">
                  <i class="fas fa-barcode"></i>
                </label>
              </label>
            </div>
            <div class="section mb10">
              <label for="catalog_description" class="field prepend-icon">
                <input type="text" name="catalog_description" id="catalog_description" class="gui-input" placeholder="Descripción">
                <label for="catalog_description" class="field-icon">
                  <i class="fa fa-tag"></i>
                </label>
              </label>
            </div>

            <h5><small>CATEGORIA</small></h5>
            <div class="section mb15 ">
              <label class="field form-group">
                <?php  
                print($this->html->input('catalog_category','select',$this->catalogCategory,
                        array(
                            "id"=>'catalog_category',
                            "class"=>"select2-single form-control",
                            "placeholder"=>"Categorias"
                        ),
                      false)
                );
                ?>
                  <i class="arrow double"></i>
              </label>
            </div>
            
            <h5><small>ESTATUS</small></h5>
            <div class="section mb15">
              <label class="field form-group">
                  
                <?php  
                print($this->html->input('catalog_status','select',array(0=>array("id"=>1,"description"=>'Activo'),1=>array("id"=>2,"description"=>'Inactivo')),
                        array(
                            "id"=>'catalog_status',
                            "class"=>"select2-single form-control",
                            "placeholder"=>"Estatus de Árticulo"
                        ),
                      false)
                );
                ?>
                <i class="arrow double"></i>
              </label>
            </div>

            <hr class="short">

            <div class="section container-fluid">
                <button class="btn ladda-button btn-default btn-sm ph15 progress-button progress-button" id="search" type="button" data-style="zoom-out"><span class="ladda-label">Aplicar Filtro</span></button>
                <button class="btn ladda-button btn-default btn-sm ph15 progress-button progress-button" id="reset" type="button" data-style="zoom-out"><span class="ladda-label">Quitar Filtro</span></button>
            </div>
            
            </form>
          </div>

        </aside>
        <!-- end: .tray-right -->
        
</section>
<!-- End: Content -->