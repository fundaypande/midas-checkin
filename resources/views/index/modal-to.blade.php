
<div id="modal-to" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

        <button class="uk-modal-close-default" type="button" uk-close></button>

        <!-- <h3>Where is your position?</h3> -->
        <div class="uk-margin">
            <div class="uk-form-controls">
                <!-- <span class="uk-form-icon" uk-icon="icon: location"></span> -->
                <input class="uk-input uk-form-width-large uk-width-1-1" type="text" placeholder="Where is your destination?">
            </div>
        </div>

        
        <div class="nde-modal-position">
            @foreach($provinces as $province)
                <h4 style="font-weight: 600">{{ $province->name }}</h4>
                <ul class="uk-list uk-list-divider">
                    @foreach( $locations->where('province_id', $province->province_id) as $location )
                        <li class="nde-location-list" onclick="setTo('{{$location->location}}',{{$location->location_id}})">{{ $location->location }}</li>
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