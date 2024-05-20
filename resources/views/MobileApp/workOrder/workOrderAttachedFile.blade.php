@extends('layouts.mobileApp.mobileApp')

@section('content')
@section('title', 'Work Orders')
<ul class="flex space-x-2 rtl:space-x-reverse">
    <li>
        <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
    </li>
    <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
        <span>Work Orders</span>
    </li>
</ul>
<div class="panel mt-4">
    <div class="text-center">
        <h1 class="text-xl font-semibold">Proof of Completion</h1>
        <div>
            <div class="flex items-center justify-center mt-4">
                <button id="open-camera-button" class="btn btn-info">Open Camera</button>
            </div>
            <div id="camera-container" style="display: none;">

                <div class="flex items-center justify-center">
                    <video id="video" width="320" height="240" autoplay></video>
                    <canvas id="canvas" style="display:none;"></canvas>
                </div>

                <div class="flex items-center justify-center mt-4">
                    <button id="capture-button" class="btn btn-secondary">Capture Image</button>
                </div>
            </div>

        </div>
        <div class="mt-10">
            <form class="max-w-sm" enctype="multipart/form-data" action="{{ url('housekeeper/report-completed/'.$work_order->id) }}" method="POST">
                @csrf
                @method('PUT')
                <label for="file-input" class="sr-only">Choose file</label>
                <input required type="file" name="image" id="file-input" class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400
    file:bg-gray-50 file:border-0
    file:me-4
    file:py-3 file:px-4
    dark:file:bg-neutral-700 dark:file:text-neutral-400">
                <div class="flex items-center justify-center mt-4">
                    <button type="submit" class="btn btn-success" @click="toggle">Report Completed</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const captureButton = document.getElementById('capture-button');
        const fileInput = document.getElementById('file-input');
        const cameraContainer = document.getElementById('camera-container');
        const openCameraButton = document.getElementById('open-camera-button');
        let stream;

        // Function to open the camera and start streaming video
        function openCamera() {
            navigator.mediaDevices.getUserMedia({ video: { facingMode: 'environment' } })
                .then(function(mediaStream) {
                    stream = mediaStream;
                    video.srcObject = stream;
                    cameraContainer.style.display = 'block';
                    openCameraButton.style.display = 'none';
                })
                .catch(function(error) {
                    console.error("Error accessing the camera: ", error);
                });
        }

        // Function to capture the image from the video stream
        function captureImage() {
            const context = canvas.getContext('2d');
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            context.drawImage(video, 0, 0, canvas.width, canvas.height);

            canvas.toBlob(function(blob) {
                // Create a File object from the Blob and attach it to the file input
                const file = new File([blob], 'capture.png', { type: 'image/png' });
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);
                fileInput.files = dataTransfer.files;

                // Hide camera container and stop video stream
                cameraContainer.style.display = 'none';
                openCameraButton.style.display = 'block';
                if (stream) {
                    stream.getTracks().forEach(track => track.stop());
                }
            });
        }

        // Event listener to open the camera
        openCameraButton.addEventListener('click', openCamera);

        // Event listener to capture the image
        captureButton.addEventListener('click', captureImage);
    });
</script>
@endsection