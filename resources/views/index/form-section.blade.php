
<span>
    <h3 class="uk-card-title nde-center">Book Your <b class="nde-blue-text">Fastboats</b></h3>
    <input type="hidden" id="from-field-id" value="1">
    <input type="hidden" id="to-field-id" value="11">
</span>
    <div class="nde-devider-one"></div>
    <div class="columns">
        <div class="column">
        <div class="field">
            <label class="label">From</label>
            <div class="control has-icons-left has-icons-right">
                <input id="from-field" class="input is-medium" style="cursor: pointer;" type="text" placeholder="Text input" value="Bali (All Port)">
                <span class="icon is-small is-left">
                <i class="fas fa-map-marker-alt nde-icon-color-blue"></i>
                </span>
            </div>
            <!-- <p class="help is-success">This username is available</p> -->
            </div>
        </div>
        <div class="column">
        <div class="field">
            <label class="label">To</label>
            <div class="control has-icons-left has-icons-right">
                <input id="to-field" class="input is-medium" style="cursor: pointer;" type="text" placeholder="Text input" value="Nusa Penida">
                <span class="icon is-small is-left ">
                <i class="fas fa-map-marker-alt nde-icon-color-blue"></i>
                </span>
            </div>
            <!-- <p class="help is-success">This username is available</p> -->
            </div>
        </div>
        <!-- <div class="column">
            <div class="field">
                <label class="label">Date</label>
                <div class="control has-icons-left has-icons-right">
                    <input id="date-field" class="input is-medium" style="cursor: pointer;" type="text" placeholder="Text input" value="{{ $date }}">
                    <span class="icon is-small is-left">
                    <i class="fas fa-calendar-alt nde-icon-color-blue"></i>
                    </span>
                </div>
                <p class="help is-success">This username is available</p>
            </div>
        </div> -->
    </div>
    <div class="columns">
        <div class="column">
            <div class="field">
                <label class="label">Date</label>
                <div class="control has-icons-left has-icons-right">
                    <input id="date-field" class="input" style="cursor: pointer;" type="text" placeholder="Text input" value="{{ $date }}">
                    <span class="icon is-small is-left">
                    <i class="fas fa-calendar-alt nde-icon-color-blue"></i>
                    </span>
                </div>
                <!-- <p class="help is-success">This username is available</p> -->
            </div>
        </div>
        <div class="column">
            <div class="columns is-mobile">
                <div class="column" style="padding-right: 0px;">
                    <div class="field">
                        <label class="label">Adult</label>
                        <div class="control">
                        <div class="select" style="width: 100%;">
                            <select id="adult-form" style="width: 100%;">
                                <option value="1">1 Adult</option>
                                <option value="2">2 Adult</option>
                                <option value="3">3 Adult</option>
                                <option value="4">4 Adult</option>
                                <option value="5">5 Adult</option>
                                <option value="6">6 Adult</option>
                                <option value="7">7 Adult</option>
                                <option value="8">8 Adult</option>
                                <option value="9">9 Adult</option>
                                <option value="10">10 Adult</option>
                                <option value="11">11 Adult</option>
                                <option value="12">12 Adult</option>
                                <option value="13">13 Adult</option>
                                <option value="14">14 Adult</option>
                                <option value="15">15 Adult</option>
                            </select>
                            </div>
                        </div>
                        <!-- <p class="help is-success">This username is available</p> -->
                    </div>
                </div>
                <div class="column" style="padding-left: 0px;">
                    <div class="field">
                        <label class="label">Children</label>
                        <div class="control">
                            <div class="select" style="width: 100%;">
                            <select id="children-form" style="width: 100%;">
                                <option value="0">0 Children</option>
                                <option value="1">1 Children</option>
                                <option value="2">2 Children</option>
                                <option value="3">3 Children</option>
                                <option value="4">4 Children</option>
                                <option value="5">5 Children</option>
                                <option value="6">6 Children</option>
                                <option value="7">7 Children</option>
                            </select>
                            </div>
                        </div>
                        <!-- <p class="help is-success">This username is available</p> -->
                    </div>
                </div>
            </div>
            
        </div>
        <div class="column is-one-fifth nde-box-label">
            <label style="font-size: 22px;" class="nde-label-cek"><input style="height: 24px;width: 24px;" class="uk-checkbox" type="checkbox" checked> Return</label>
        </div>
    </div>
    <button id="btn-search-speedboat" class="button is-warning is-medium is-fullwidth nde-search-btn">SEARCH SPEEDBOATS</button>

    <div id='speedboat-result'>
    <br>
    
    <!-- <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
        <div class="uk-card-media-left uk-cover-container nde-media-result">
            <div class="nde-discount-result">
                <span class="nde-discount-value">10%</span>
                <span class="nde-discount-off">OFF</span>
            </div>
            <img src="images/light.jpg" alt="" uk-cover>
            <canvas width="300" height="175"></canvas>
        </div>
        <div>
            <div class="uk-card-body">
                <h3 class="uk-card-title nde-result-title">Media Left</h3>
                <p class="nde-result-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                <div class="nde-price-book">
                    <div class="columns">
                        <div class="column">
                        <ul uk-accordion>
                            <li>
                                <a class="uk-accordion-title" href="#">Features</a>
                                <div class="uk-accordion-content">
                                    <ul>
                                        <li>High Speed Safe and comfort</li>
                                        <li>Accredited Captain and Crew</li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                        </div>
                        <div class="column">
                            <div class="columns is-mobile" style="padding-bottom: 0px; margin-bottom: 3px;">
                                <div class="column nde-price-text" style="padding-bottom: 0px;">
                                    IDR 100.000
                                </div>
                                <div id="discount-section" class="column" style="padding-bottom: 0px;">
                                    <span class="nde-discount-text" style="text-decoration: line-through red; font-size: 13px;">
                                        IDR 50.000
                                    </span>
                                </div>
                            </div>
                            <button style="width: 100%" onclick="openOrder()" class="uk-button uk-button-primary">BOOK NOW</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->


    
    </div>
