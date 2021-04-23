
<div id="modal-from" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

        <button class="uk-modal-close-default" type="button" uk-close></button>

        <!-- <h3>Where is your position?</h3> -->
        <div class="uk-margin">
            <div class="uk-form-controls">
                <!-- <span class="uk-form-icon" uk-icon="icon: location"></span> -->
                <input class="uk-input uk-form-width-large uk-width-1-1" type="text" placeholder="Where is your position?">
            </div>
        </div>
        
        <ul uk-accordion>
            <li>
                <a class="uk-accordion-title" href="#">Pick Me Up From Hotel</a>
                <div class="uk-accordion-content">
                    <div class="uk-form-controls">
                        <!-- <span class="uk-form-icon" uk-icon="icon: location"></span> -->
                        <input id="input-hotel-name" class="uk-input uk-form-width-medium uk-width-1-1" type="text" placeholder="Hotel name">
                    </div>
                    <div class="uk-form-controls">
                        <!-- <span class="uk-form-icon" uk-icon="icon: location"></span> -->
                        <input id="input-hotel-address" class="uk-input uk-form-width-medium uk-width-1-1" type="text" placeholder="Hotel address">
                    </div>
                    <button id="btn-save-pickup" class="uk-button uk-button-primary uk-width-1-1">Save</button>
                </div>
            </li>
        </ul>

        
        <div class="nde-modal-position">
            @foreach($provinces as $province)
                <h4 style="font-weight: 600">{{ $province->name }}</h4>
                <ul class="uk-list uk-list-divider">
                    @foreach( $locations->where('province_id', $province->province_id) as $location )
                        <li class="nde-location-list" onclick="setFrom('{{$location->location}}',{{$location->location_id}})">{{ $location->location }}</li>
                    @endforeach
                </ul>
            @endforeach

        </div>
        

        <!-- <p class="uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
            <button class="uk-button uk-button-primary" type="button">Save</button>
        </p> -->
    </div>
</div>