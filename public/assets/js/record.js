
let preview = document.getElementById("preview");
let recording = document.getElementById("recording");
let startButton = document.getElementById("startButton");
let stopButton = document.getElementById("stopButton");
let downloadButton = document.getElementById("downloadButton");
let recorded = document.getElementById("recorded");
let downloadLocalButton = document.getElementById("downloadLocalButton");
let btn_group = document.getElementById("btn_group");
let video_part = document.getElementById("video-part");
let upload_video = document.getElementById("upload_video");
let spinner = document.getElementById("spinner");

var localstream;

window.log = function (msg) {
    alert(msg)
}

window.wait = function (delayInMS) {
return new Promise(resolve => setTimeout(resolve, delayInMS));
}

let recoder, stopped, data;
window.startRecording = function (stream) {
    recorder = new MediaRecorder(stream);
    data = [];

    recorder.ondataavailable = event => data.push(event.data);
    recorder.start();

    stopped = new Promise((resolve, reject) => {
        recorder.onstop = resolve;
        recorder.onerror = event => reject(event.name);
    });
}

window.stop = async function (stream) {
    stream.getTracks().forEach(track => track.stop());
    recorder.stop();
    await Promise.all([
        stopped,
        recorded
    ])
    .then(() => data);
    let recordedChunks = data;
    recording.style.display = "block";
    spinner.classList.add("d-none");
    let recordedBlob = new Blob(recordedChunks, {
        type: "video/mp4"
    });
    recording.src = URL.createObjectURL(recordedBlob);

    formData.append('video', recordedBlob);

    // log("Successfully recorded " + recordedBlob.size + " bytes of " + recordedBlob.type + " media.");
    startButton.innerHTML = "Start";
    stopButton.style.display = "none";
    localstream.getTracks()[0].stop();
}

var formData = new FormData();
if (startButton) {
    startButton.addEventListener("click", function () {
        navigator.mediaDevices.getUserMedia({
            video: true,
            audio: true
        }).then(stream => {
            startButton.innerHTML = "<span class='spinner-grow spinner-grow-sm mr-1'></span>Recording..";
            stopButton.style.display = "inline-block";
            video_part.style.paddingTop = '0px';

            preview.srcObject = stream;
            localstream = stream;
            preview.captureStream = preview.captureStream || preview.mozCaptureStream;
            return new Promise(resolve => preview.onplaying = resolve);
        }).then(() => startRecording(preview.captureStream()))
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
        preview.style.display = "none";
        btn_group.style.display = 'none';
        video_part.style.paddingTop = '0px';
        video_part.style.display = 'flex';
        spinner.classList.remove("d-none");
        localstream.getTracks()[0].stop();
    }, false);
}
