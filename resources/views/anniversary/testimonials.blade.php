<div ng-controller="TestimonialController" ng-cloak="" class="carddemoBasicUsage" >
    <div style="overflow-x:auto ; height:500px; display: flex">
        <md-card style="min-width: 350px" ng-repeat="test in testimonials" md-theme="dark-blue" md-theme-watch="">
            <img style="width:100% ; height: 50%;" ng-src="@{{test['image']}}" class="md-card-image" alt="Washed Out">
            <md-card-title>
                <md-card-title-text>
                    <span class="md-headline">@{{test['name']}}</span>
                    <span style="max-width: 400px" class="md-subhead">@{{test['text']}}</span>
                </md-card-title-text>
            </md-card-title>
            <md-card-actions layout="row" layout-align="end center">
                <md-button>Action 1</md-button>
                <md-button>Action 2</md-button>
            </md-card-actions>
        </md-card>
    </div>
</div>