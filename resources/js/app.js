import './bootstrap';
import Alpine from 'alpinejs'
import Clipboard from '@ryangjchandler/alpine-clipboard'
import persist from "@alpinejs/persist";
import 'flowbite';

Alpine.plugin([Clipboard, persist])
Alpine.start()
