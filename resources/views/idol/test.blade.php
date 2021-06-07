@extends('layouts.idol')

@section('title', 'Welcome to MillionK')

@section('styles')
<style>

</style>
@endsection

@section('content')
<div class="row">
	<div class="col-md-6">
		<h2 class="text-white">Preview</h2>
		<video id="preview" width="160" height="120" autoplay muted></video><br/><br/>
		<div class="btn-group">
			<div id="startButton" class="btn btn-success text-white"> Start </div>
			<div id="stopButton" class="btn btn-danger text-white" style="display:none;"> Stop </div>
		</div>
	</div>
	<div class="col-md-6" id="recorded"  style="display:none">
		<h2 class="text-white">Recording</h2>
		<video id="recording" width="160" height="120" controls></video><br/><br/>
		<a id="downloadButton" class="btn btn-primary text-white" data-url="{{route('videos.store')}}">save</a>
		<a id="downloadLocalButton" class="btn btn-primary text-white">Download</a>
	</div>
</div>
@endsection

@section('scripts')
<script>
    let preview = document.getElementById("preview");
    let recording = document.getElementById("recording");
    let startButton = document.getElementById("startButton");
    let stopButton = document.getElementById("stopButton");
    let downloadButton = document.getElementById("downloadButton");
    let logElement = document.getElementById("log");
    let recorded = document.getElementById("recorded");
    let downloadLocalButton = document.getElementById("downloadLocalButton");

    let recordingTimeMS = 1000 * 60 * 10; //video limit 5 sec
    var localstream;

    window.log = function (msg) {
    //logElement.innerHTML += msg + "\n";
    console.log(msg);
    }

    window.wait = function (delayInMS) {
        return new Promise(resolve => setTimeout(resolve, delayInMS));
    }

    window.startRecording = function (stream, lengthInMS) {
        let recorder = new MediaRecorder(stream);
        let data = [];

        recorder.ondataavailable = event => data.push(event.data);
        recorder.start();
        log(recorder.state + " for " + (lengthInMS / 1000) + " seconds...");

        let stopped = new Promise((resolve, reject) => {
            recorder.onstop = resolve;
            recorder.onerror = event => reject(event.name);
        });

        let recorded = wait(lengthInMS).then(
            () => recorder.state == "recording" && recorder.stop()
        );

        return Promise.all([
            stopped,
            recorded
        ])
        .then(() => data);
    }

    window.stop = function (stream) {
        stream.getTracks().forEach(track => track.stop());
    }
    var formData = new FormData();
    if (startButton) {
        startButton.addEventListener("click", function () {
            startButton.innerHTML = "Pause";
            recorded.style.display = "none";
            stopButton.style.display = "inline-block";
            downloadButton.innerHTML = "rendering..";
            navigator.mediaDevices.getUserMedia({
                video: true,
                audio: true
            }).then(stream => {
                preview.srcObject = stream;
                localstream = stream;
                //downloadButton.href = stream;
                preview.captureStream = preview.captureStream || preview.mozCaptureStream;
                return new Promise(resolve => preview.onplaying = resolve);
            }).then(() => startRecording(preview.captureStream(), recordingTimeMS))
            .then(recordedChunks => {
                let recordedBlob = new Blob(recordedChunks, {
                type: "video/mp4"
                });
                recording.src = URL.createObjectURL(recordedBlob);

                formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
                formData.append('video', recordedBlob);

                downloadLocalButton.href = recording.src;
                downloadLocalButton.download = "RecordedVideo.mp4";
                log("Successfully recorded " + recordedBlob.size + " bytes of " +
                recordedBlob.type + " media.");
                startButton.innerHTML = "Start";
                stopButton.style.display = "none";
                recorded.style.display = "block";
                downloadButton.innerHTML = "Save";
                localstream.getTracks()[0].stop();
            })
            .catch(log);
        }, false);
    }
    if (downloadButton) {
        downloadButton.addEventListener("click", function () {
            $.ajax({
                url: this.getAttribute('data-url'),
                method: 'POST',
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function (res) {
                    if(res.success){
                        location.reload();
                    }
                }
            });
        }, false);
    }
    if (stopButton) {
        stopButton.addEventListener("click", function () {
            stop(preview.srcObject);
            startButton.innerHTML = "Start";
            stopButton.style.display = "none";
            recorded.style.display = "block";
            downloadButton.innerHTML = "Save";
            localstream.getTracks()[0].stop();
        }, false);
    }
</script>
<script>
$(document).ready(function() {
    $(document).on('click', '.occasion-item', function() {
        if($(this).hasClass('active')) {
            $(this).removeClass('active');
        } else {
            $(this).addClass('active');
        }
    });
});
</script>
@endsection