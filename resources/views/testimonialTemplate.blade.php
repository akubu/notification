
<md-dialog aria-label="Mango (Fruit)" style="max-width: 600px">
    <form ng-cloak>

            <div>
                <img src="/images/facebook.png" style="width:100%;height:25%" />
            </div>


        <md-dialog-content>
            <div class="md-dialog-content" style="display:flex; flex-direction: column">
                <md-input-container>
                    <label>Your Name</label>
                    <input ng-model="name">
                </md-input-container>
                <md-input-container class="md-block">
                    <label>Write about us</label>
                    <textarea ng-model="text"  rows="10" md-select-on-focus></textarea>
                </md-input-container>
            </div>
        </md-dialog-content>

        <md-dialog-actions layout="row">
            <md-button ng-click="answer('submit')">
                Submit
            </md-button>
            <md-button ng-click="answer('cancel')">
                Cancel
            </md-button>
        </md-dialog-actions>
    </form>
</md-dialog>