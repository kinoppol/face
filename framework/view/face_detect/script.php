<?php
$ret="const imageUpload = document.getElementById('imageUpload')

Promise.all([
    faceapi.nets.faceRecognitionNet.loadFromUri('recognition/models'),
    faceapi.nets.faceLandmark68Net.loadFromUri('recognition/models'),
    faceapi.nets.ssdMobilenetv1.loadFromUri('recognition/models')
    ]).then(start)

async function start(){
    const container = document.createElement('div')
    container.style.position = 'relative'
    document.getElementById(\"overlay\").append(container)
    const labeledFaceDescriptors = await loadLabeledImages()
    const faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptors, 0.5)
    let image, canvas

    var stdiv = document.getElementById('status');
    var nldiv = document.getElementById('nameList');

    stdiv.innerHTML='โหลดเสร็จแล้ว';
    document.getElementById('imageUpload').disabled = false;

    imageUpload.addEventListener('change', async () => {
    nldiv.innerHTML='';
        if (image) image.remove()
        if (canvas) canvas.remove()
        image = await faceapi.bufferToImage(imageUpload.files[0])
        container.append(image)
        canvas = faceapi.createCanvasFromMedia(image)
        container.append(canvas)
        const displaySize = { width: image.width, height: image.height }
        faceapi.matchDimensions(canvas, displaySize)
        const detections = await faceapi.detectAllFaces(image).withFaceLandmarks().withFaceDescriptors()
        const resizedDetections = faceapi.resizeResults(detections, displaySize)
        const results = resizedDetections.map(d => faceMatcher.findBestMatch(d.descriptor))
        results.forEach((result, i) => {
            const box = resizedDetections[i].detection.box
            //const options = { boxColor: \"#FF80AA\" }
            const drawBox = new faceapi.draw.DrawBox(box, { boxColor: \"#0000FF\",label: result.toString() })
            drawBox.draw(canvas)
            if(i>1){
                nldiv.innerHTML=nldiv.innerHTML+result.toString()
            }
          })
    })
}

function loadLabeledImages() {
    const labels = ".$lables."
    const num_pictures=".$num_pictures."
    const pictures_url=".$pictures_url."
    return Promise.all(
        labels.map(async label => {
            const descriptions = []
            var pic_no=0;
    var stdiv = document.getElementById('status');

            for (let i = 0; i < num_pictures[pic_no]; i++) {
                const img = await faceapi.fetchImage(pictures_url[pic_no][i])
                const detections = await faceapi.detectSingleFace(img).withFaceLandmarks().withFaceDescriptor()
                descriptions.push(detections.descriptor)
                
              stdiv.innerHTML=`วิเคราะห์รูป \${label} (\${i+1}/`+num_pictures[pic_no]+`)`; 
              }
              pic_no++;  
        return new faceapi.LabeledFaceDescriptors(label, descriptions)
    })
  )
}
  ";
  print $ret; 