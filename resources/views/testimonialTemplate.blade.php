
<md-dialog aria-label="Mango (Fruit)" style="max-width: 600px">
    <form ng-cloak>

            <div>
                <img src="/images/testimonial.png" style="width:100%;height:25%" />
            </div>


        <md-dialog-content>
            <div class="md-dialog-content" style="display:flex; flex-direction: column">
                <md-input-container>
                    <label>Your Name</label>
                    <input ng-model="name" required>
                </md-input-container>
                <md-input-container class="md-block">
                    <label>Write about them</label>
                    <textarea ng-model="text"  rows="1" md-select-on-focus required></textarea>
                </md-input-container>
                <md-input-container class="md-block">
                    <label>Upload your pic with them or click submit</label>
                    <input ngf-select="upload($file)">
                </md-input-container>
            </div>
        </md-dialog-content>

        <md-dialog-actions layout="row">
            <md-button ng-click="answer('submit')">
                Submit
            </md-button>
            <md-button ng-click="cancel()">
                Cancel
            </md-button>
        </md-dialog-actions>
    </form>
</md-dialog>