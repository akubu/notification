
<md-dialog aria-label="Mango (Fruit)" style="max-width: 300px">
    <form ng-cloak>

        <div>
            <img src="/images/upload.png" style="width:100%;height:25%" />
        </div>


        <md-dialog-content>
            <div class="md-dialog-content" style="display:flex; flex-direction: column">

                <md-input-container class="md-block">
                    <label>Choose file to upload</label>
                    {{--<input type="file" id="file">--}}
                    <input ngf-select="upload($file)" required>
                </md-input-container>
            </div>
        </md-dialog-content>
        <md-dialog-actions layout="row">
            <md-button ng-click="cancel()">
                Cancel
            </md-button>
        </md-dialog-actions>
    </form>
</md-dialog>