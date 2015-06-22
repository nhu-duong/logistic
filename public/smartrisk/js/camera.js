/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var appCamera = {
    // send photo to
    recordType: 0,
    sendPhoto: function(imageData) {
        $.ajax({
            url: app.baseDomain + "/home/add-record",
            data: {
                record_type: appCamera.recordType,
                value: 0,
                value_2: 0,
//                image: imageData,
                latitude: 12,
                longitude: 13
//            $record->record_type = $request->get('record_type');
//            $record->value = $request->get('value');
//            $record->value_2 = $request->get('value_2');
//            $record->image = $request->get('image');
//            $record->image_2 = $request->get('image_2');
//            $record->remote_ip = $request->get('remote_ip');
//            $record->latitude = $request->get('latitude');
//            $record->longitude = $request->get('longitude');
            },
            method: "POST",
            dataType: "json",
            success: function(data) {
                alert(data.message);
            }
        });
    },
    takePhotoFailHandler: function() {
        
    },
    takePhoto: function(recordType) {
        this.recordType = recordType;
        navigator.camera.getPicture(
            appCamera.sendPhoto, 
            appCamera.takePhotoFailHandler, 
            {quality: 50, destinationType: Camera.DestinationType.DATA_URL}
        );
    }
};