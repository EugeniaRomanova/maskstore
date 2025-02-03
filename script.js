import * as THREE from './three.js-master/build/three.module.js'
import {GLTFLoader} from './three.js-master/build/GLTFLoader.js'

let element = document.querySelector('.index__header--logo');

const w = element.offsetWidth;
const h = element.offsetHeight;
console.log('прием');
var renderer = new THREE.WebGLRenderer({antialias:true});
renderer.setSize(w, h);
renderer.setClearColor(0x000000, 0);
element.appendChild(renderer.domElement);

renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
renderer.shadowMap.enabled = true;
renderer.gammaOutput = true;

const scene = new THREE.Scene();
var model;

const loader = new GLTFLoader();

loader.load('assets/scene.gltf', drdr);

var obj = new THREE.Object3D();

function drdr(gltf) {
  const box = new THREE.Box3().setFromObject(gltf.scene);
  const c = box.getCenter(new THREE.Vector3());
  const size = box.getSize(new THREE.Vector3());
  gltf.scene.position.set( -c.x, size.y / 2 - c.y, -c.z );
  obj.add(gltf.scene);
};

obj.position.set(0, 0, 0);
obj.scale.set(1, 1, 1);
scene.add(obj);

var camera = new THREE.PerspectiveCamera(70, w / h);
camera.position.y = 2;
camera.position.z = 5;
scene.add(camera);

var light = new THREE.DirectionalLight(0xFFFFFF, 3);
light.position.set(3, 5, 5);
scene.add(light);

function render() {
  if (obj != null) {
    obj.rotation.y += 0.01;
  }
  renderer.render(scene, camera);
  requestAnimationFrame(render);
};

render();
