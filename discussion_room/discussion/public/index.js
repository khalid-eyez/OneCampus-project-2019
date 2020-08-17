/*global io*/
/** @type {RTCConfiguration} */
const config = { // eslint-disable-line no-unused-vars
  'iceServers': [{
    'urls': ['stun:stun.l.google.com:19302'],
    
      'urls': ['turn:54.149.135.227:3478'],
      'username': 'winna',
      'credential': 'limpbi',
      'credentialType':'password'
  }]
};

const socket = io.connect("http://172.16.52.54:3000");
const video = document.querySelector('video'); // eslint-disable-line no-unused-vars

window.onunload = window.onbeforeunload = function() {
	socket.close();
};

