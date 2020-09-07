(function() {
    var e, t, n, i, o, r, s, l, a = [].slice,
        u = {}.hasOwnProperty,
        d = function(e, t) {
            function n() {
                this.constructor = e
            }
            for (var i in t) u.call(t, i) && (e[i] = t[i]);
            return n.prototype = t.prototype, e.prototype = new n, e.__super__ = t.prototype, e
        };
    s = function() {}, t = function() {
        function e() {}
        return e.prototype.addEventListener = e.prototype.on, e.prototype.on = function(e, t) {
            return this._callbacks = this._callbacks || {}, this._callbacks[e] || (this._callbacks[e] = []), this._callbacks[e].push(t), this
        }, e.prototype.emit = function() {
            var e, t, n, i, o, r;
            if (i = arguments[0], e = 2 <= arguments.length ? a.call(arguments, 1) : [], this._callbacks = this._callbacks || {}, n = this._callbacks[i])
                for (o = 0, r = n.length; r > o; o++) t = n[o], t.apply(this, e);
            return this
        }, e.prototype.removeListener = e.prototype.off, e.prototype.removeAllListeners = e.prototype.off, e.prototype.removeEventListener = e.prototype.off, e.prototype.off = function(e, t) {
            var n, i, o, r, s;
            if (!this._callbacks || 0 === arguments.length) return this._callbacks = {}, this;
            if (i = this._callbacks[e], !i) return this;
            if (1 === arguments.length) return delete this._callbacks[e], this;
            for (o = r = 0, s = i.length; s > r; o = ++r)
                if (n = i[o], n === t) {
                    i.splice(o, 1);
                    break
                }
            return this
        }, e
    }(), e = function(e) {
        function n(e, t) {
            var o, r, s;
            if (this.element = e, this.version = n.version, this.defaultOptions.previewTemplate = this.defaultOptions.previewTemplate.replace(/\n*/g, ""), this.clickableElements = [], this.listeners = [], this.files = [], "string" == typeof this.element && (this.element = document.querySelector(this.element)), !this.element || null == this.element.nodeType) throw new Error("Invalid dropzone element.");
            if (this.element.dropzone) throw new Error("Dropzone already attached.");
            if (n.instances.push(this), this.element.dropzone = this, o = null != (s = n.optionsForElement(this.element)) ? s : {}, this.options = i({}, this.defaultOptions, o, null != t ? t : {}), this.options.forceFallback || !n.isBrowserSupported()) return this.options.fallback.call(this);
            if (null == this.options.url && (this.options.url = this.element.getAttribute("action")), !this.options.url) throw new Error("No URL provided.");
            if (this.options.acceptedFiles && this.options.acceptedMimeTypes) throw new Error("You can't provide both 'acceptedFiles' and 'acceptedMimeTypes'. 'acceptedMimeTypes' is deprecated.");
            this.options.acceptedMimeTypes && (this.options.acceptedFiles = this.options.acceptedMimeTypes, delete this.options.acceptedMimeTypes), this.options.method = this.options.method.toUpperCase(), (r = this.getExistingFallback()) && r.parentNode && r.parentNode.removeChild(r), this.options.previewsContainer !== !1 && (this.previewsContainer = this.options.previewsContainer ? n.getElement(this.options.previewsContainer, "previewsContainer") : this.element), this.options.clickable && (this.clickableElements = this.options.clickable === !0 ? [this.element] : n.getElements(this.options.clickable, "clickable")), this.init()
        }
        var i, o;
        return d(n, e), n.prototype.Emitter = t, n.prototype.events = ["drop", "dragstart", "dragend", "dragenter", "dragover", "dragleave", "addedfile", "removedfile", "thumbnail", "error", "errormultiple", "processing", "processingmultiple", "uploadprogress", "totaluploadprogress", "sending", "sendingmultiple", "success", "successmultiple", "canceled", "canceledmultiple", "complete", "completemultiple", "reset", "maxfilesexceeded", "maxfilesreached", "queuecomplete"], n.prototype.defaultOptions = {
            url: null,
            method: "post",
            withCredentials: !1,
            parallelUploads: 2,
            uploadMultiple: !1,
            maxFilesize: 256,
            paramName: "file",
            createImageThumbnails: !0,
            maxThumbnailFilesize: 10,
            thumbnailWidth: 120,
            thumbnailHeight: 120,
            filesizeBase: 1e3,
            maxFiles: null,
            filesizeBase: 1e3,
            params: {},
            clickable: !0,
            ignoreHiddenFiles: !0,
            acceptedFiles: null,
            acceptedMimeTypes: null,
            autoProcessQueue: !0,
            autoQueue: !0,
            addRemoveLinks: !1,
            previewsContainer: null,
            capture: null,
            dictDefaultMessage: "Drop files here to upload",
            dictFallbackMessage: "Your browser does not support drag'n'drop file uploads.",
            dictFallbackText: "Please use the fallback form below to upload your files like in the olden days.",
            dictFileTooBig: "File is too big ({{filesize}}MiB). Max filesize: {{maxFilesize}}MiB.",
            dictInvalidFileType: "You can't upload files of this type.",
            dictResponseError: "Server responded with {{statusCode}} code.",
            dictCancelUpload: "Cancel upload",
            dictCancelUploadConfirmation: "Are you sure you want to cancel this upload?",
            dictRemoveFile: "Remove file",
            dictRemoveFileConfirmation: null,
            dictMaxFilesExceeded: "You can not upload any more files.",
            accept: function(e, t) {
                return t()
            },
            init: function() {
                return s
            },
            forceFallback: !1,
            fallback: function() {
                var e, t, i, o, r, s;
                for (this.element.className = "" + this.element.className + " dz-browser-not-supported", s = this.element.getElementsByTagName("div"), o = 0, r = s.length; r > o; o++) e = s[o], /(^| )dz-message($| )/.test(e.className) && (t = e, e.className = "dz-message");
                return t || (t = n.createElement('<div class="dz-message"><span></span></div>'), this.element.appendChild(t)), i = t.getElementsByTagName("span")[0], i && (i.textContent = this.options.dictFallbackMessage), this.element.appendChild(this.getFallbackForm())
            },
            resize: function(e) {
                var t, n, i;
                return t = {
                    srcX: 0,
                    srcY: 0,
                    srcWidth: e.width,
                    srcHeight: e.height
                }, n = e.width / e.height, t.optWidth = this.options.thumbnailWidth, t.optHeight = this.options.thumbnailHeight, null == t.optWidth && null == t.optHeight ? (t.optWidth = t.srcWidth, t.optHeight = t.srcHeight) : null == t.optWidth ? t.optWidth = n * t.optHeight : null == t.optHeight && (t.optHeight = 1 / n * t.optWidth), i = t.optWidth / t.optHeight, e.height < t.optHeight || e.width < t.optWidth ? (t.trgHeight = t.srcHeight, t.trgWidth = t.srcWidth) : n > i ? (t.srcHeight = e.height, t.srcWidth = t.srcHeight * i) : (t.srcWidth = e.width, t.srcHeight = t.srcWidth / i), t.srcX = (e.width - t.srcWidth) / 2, t.srcY = (e.height - t.srcHeight) / 2, t
            },
            drop: function() {
                return this.element.classList.remove("dz-drag-hover")
            },
            dragstart: s,
            dragend: function() {
                return this.element.classList.remove("dz-drag-hover")
            },
            dragenter: function() {
                return this.element.classList.add("dz-drag-hover")
            },
            dragover: function() {
                return this.element.classList.add("dz-drag-hover")
            },
            dragleave: function() {
                return this.element.classList.remove("dz-drag-hover")
            },
            paste: s,
            reset: function() {
                return this.element.classList.remove("dz-started")
            },
            addedfile: function(e) {
                var t, i, o, r, s, l, a, u, d, p, c, h, m;
                if (this.element === this.previewsContainer && this.element.classList.add("dz-started"), this.previewsContainer) {
                    for (e.previewElement = n.createElement(this.options.previewTemplate.trim()), e.previewTemplate = e.previewElement, this.previewsContainer.appendChild(e.previewElement), p = e.previewElement.querySelectorAll("[data-dz-name]"), r = 0, a = p.length; a > r; r++) t = p[r], t.textContent = e.name;
                    for (c = e.previewElement.querySelectorAll("[data-dz-size]"), s = 0, u = c.length; u > s; s++) t = c[s], t.innerHTML = this.filesize(e.size);
                    for (this.options.addRemoveLinks && (e._removeLink = n.createElement('<a class="dz-remove" href="javascript:undefined;" data-dz-remove>' + this.options.dictRemoveFile + "</a>"), e.previewElement.appendChild(e._removeLink)), i = function(t) {
                            return function(i) {
                                return i.preventDefault(), i.stopPropagation(), e.status === n.UPLOADING ? n.confirm(t.options.dictCancelUploadConfirmation, function() {
                                    return t.removeFile(e)
                                }) : t.options.dictRemoveFileConfirmation ? n.confirm(t.options.dictRemoveFileConfirmation, function() {
                                    return t.removeFile(e)
                                }) : t.removeFile(e)
                            }
                        }(this), h = e.previewElement.querySelectorAll("[data-dz-remove]"), m = [], l = 0, d = h.length; d > l; l++) o = h[l], m.push(o.addEventListener("click", i));
                    return m
                }
            },
            removedfile: function(e) {
                var t;
                return e.previewElement && null != (t = e.previewElement) && t.parentNode.removeChild(e.previewElement), this._updateMaxFilesReachedClass()
            },
            thumbnail: function(e, t) {
                var n, i, o, r;
                if (e.previewElement) {
                    for (e.previewElement.classList.remove("dz-file-preview"), r = e.previewElement.querySelectorAll("[data-dz-thumbnail]"), i = 0, o = r.length; o > i; i++) n = r[i], n.alt = e.name, n.src = t;
                    return setTimeout(function() {
                        return function() {
                            return e.previewElement.classList.add("dz-image-preview")
                        }
                    }(this), 1)
                }
            },
            error: function(e, t) {
                var n, i, o, r, s;
                if (e.previewElement) {
                    for (e.previewElement.classList.add("dz-error"), "String" != typeof t && t.error && (t = t.error), r = e.previewElement.querySelectorAll("[data-dz-errormessage]"), s = [], i = 0, o = r.length; o > i; i++) n = r[i], s.push(n.textContent = t);
                    return s
                }
            },
            errormultiple: s,
            processing: function(e) {
                return e.previewElement && (e.previewElement.classList.add("dz-processing"), e._removeLink) ? e._removeLink.textContent = this.options.dictCancelUpload : void 0
            },
            processingmultiple: s,
            uploadprogress: function(e, t) {
                var n, i, o, r, s;
                if (e.previewElement) {
                    for (r = e.previewElement.querySelectorAll("[data-dz-uploadprogress]"), s = [], i = 0, o = r.length; o > i; i++) n = r[i], s.push("PROGRESS" === n.nodeName ? n.value = t : n.style.width = "" + t + "%");
                    return s
                }
            },
            totaluploadprogress: s,
            sending: s,
            sendingmultiple: s,
            success: function(e) {
                return e.previewElement ? e.previewElement.classList.add("dz-success") : void 0
            },
            successmultiple: s,
            canceled: function(e) {
                return this.emit("error", e, "Upload canceled.")
            },
            canceledmultiple: s,
            complete: function(e) {
                return e._removeLink && (e._removeLink.textContent = this.options.dictRemoveFile), e.previewElement ? e.previewElement.classList.add("dz-complete") : void 0
            },
            completemultiple: s,
            maxfilesexceeded: s,
            maxfilesreached: s,
            queuecomplete: s,
            previewTemplate: '<div class="dz-preview dz-file-preview">\n  <div class="dz-image"><img data-dz-thumbnail /></div>\n  <div class="dz-details">\n    <div class="dz-size"><span data-dz-size></span></div>\n    <div class="dz-filename"><span data-dz-name></span></div>\n  </div>\n  <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>\n  <div class="dz-error-message"><span data-dz-errormessage></span></div>\n  <div class="dz-success-mark">\n    <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">\n      <title>Check</title>\n      <defs></defs>\n      <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">\n        <path d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" stroke-opacity="0.198794158" stroke="#747474" fill-opacity="0.816519475" fill="#FFFFFF" sketch:type="MSShapeGroup"></path>\n      </g>\n    </svg>\n  </div>\n  <div class="dz-error-mark">\n    <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">\n      <title>Error</title>\n      <defs></defs>\n      <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">\n        <g id="Check-+-Oval-2" sketch:type="MSLayerGroup" stroke="#747474" stroke-opacity="0.198794158" fill="#FFFFFF" fill-opacity="0.816519475">\n          <path d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" sketch:type="MSShapeGroup"></path>\n        </g>\n      </g>\n    </svg>\n  </div>\n</div>'
        }, i = function() {
            var e, t, n, i, o, r, s;
            for (i = arguments[0], n = 2 <= arguments.length ? a.call(arguments, 1) : [], r = 0, s = n.length; s > r; r++) {
                t = n[r];
                for (e in t) o = t[e], i[e] = o
            }
            return i
        }, n.prototype.getAcceptedFiles = function() {
            var e, t, n, i, o;
            for (i = this.files, o = [], t = 0, n = i.length; n > t; t++) e = i[t], e.accepted && o.push(e);
            return o
        }, n.prototype.getRejectedFiles = function() {
            var e, t, n, i, o;
            for (i = this.files, o = [], t = 0, n = i.length; n > t; t++) e = i[t], e.accepted || o.push(e);
            return o
        }, n.prototype.getFilesWithStatus = function(e) {
            var t, n, i, o, r;
            for (o = this.files, r = [], n = 0, i = o.length; i > n; n++) t = o[n], t.status === e && r.push(t);
            return r
        }, n.prototype.getQueuedFiles = function() {
            return this.getFilesWithStatus(n.QUEUED)
        }, n.prototype.getUploadingFiles = function() {
            return this.getFilesWithStatus(n.UPLOADING)
        }, n.prototype.getActiveFiles = function() {
            var e, t, i, o, r;
            for (o = this.files, r = [], t = 0, i = o.length; i > t; t++) e = o[t], (e.status === n.UPLOADING || e.status === n.QUEUED) && r.push(e);
            return r
        }, n.prototype.init = function() {
            var e, t, i, o, r, s, l;
            for ("form" === this.element.tagName && this.element.setAttribute("enctype", "multipart/form-data"), this.element.classList.contains("dropzone") && !this.element.querySelector(".dz-message") && this.element.appendChild(n.createElement('<div class="dz-default dz-message"><span>' + this.options.dictDefaultMessage + "</span></div>")), this.clickableElements.length && (i = function(e) {
                    return function() {
                        return e.hiddenFileInput && document.body.removeChild(e.hiddenFileInput), e.hiddenFileInput = document.createElement("input"), e.hiddenFileInput.setAttribute("type", "file"), (null == e.options.maxFiles || e.options.maxFiles > 1) && e.hiddenFileInput.setAttribute("multiple", "multiple"), e.hiddenFileInput.className = "dz-hidden-input", null != e.options.acceptedFiles && e.hiddenFileInput.setAttribute("accept", e.options.acceptedFiles), null != e.options.capture && e.hiddenFileInput.setAttribute("capture", e.options.capture), e.hiddenFileInput.style.visibility = "hidden", e.hiddenFileInput.style.position = "absolute", e.hiddenFileInput.style.top = "0", e.hiddenFileInput.style.left = "0", e.hiddenFileInput.style.height = "0", e.hiddenFileInput.style.width = "0", document.body.appendChild(e.hiddenFileInput), e.hiddenFileInput.addEventListener("change", function() {
                            var t, n, o, r;
                            if (n = e.hiddenFileInput.files, n.length)
                                for (o = 0, r = n.length; r > o; o++) t = n[o], e.addFile(t);
                            return i()
                        })
                    }
                }(this))(), this.URL = null != (s = window.URL) ? s : window.webkitURL, l = this.events, o = 0, r = l.length; r > o; o++) e = l[o], this.on(e, this.options[e]);
            return this.on("uploadprogress", function(e) {
                return function() {
                    return e.updateTotalUploadProgress()
                }
            }(this)), this.on("removedfile", function(e) {
                return function() {
                    return e.updateTotalUploadProgress()
                }
            }(this)), this.on("canceled", function(e) {
                return function(t) {
                    return e.emit("complete", t)
                }
            }(this)), this.on("complete", function(e) {
                return function() {
                    return 0 === e.getUploadingFiles().length && 0 === e.getQueuedFiles().length ? setTimeout(function() {
                        return e.emit("queuecomplete")
                    }, 0) : void 0
                }
            }(this)), t = function(e) {
                return e.stopPropagation(), e.preventDefault ? e.preventDefault() : e.returnValue = !1
            }, this.listeners = [{
                element: this.element,
                events: {
                    dragstart: function(e) {
                        return function(t) {
                            return e.emit("dragstart", t)
                        }
                    }(this),
                    dragenter: function(e) {
                        return function(n) {
                            return t(n), e.emit("dragenter", n)
                        }
                    }(this),
                    dragover: function(e) {
                        return function(n) {
                            var i;
                            try {
                                i = n.dataTransfer.effectAllowed
                            } catch (o) {}
                            return n.dataTransfer.dropEffect = "move" === i || "linkMove" === i ? "move" : "copy", t(n), e.emit("dragover", n)
                        }
                    }(this),
                    dragleave: function(e) {
                        return function(t) {
                            return e.emit("dragleave", t)
                        }
                    }(this),
                    drop: function(e) {
                        return function(n) {
                            return t(n), e.drop(n)
                        }
                    }(this),
                    dragend: function(e) {
                        return function(t) {
                            return e.emit("dragend", t)
                        }
                    }(this)
                }
            }], this.clickableElements.forEach(function(e) {
                return function(t) {
                    return e.listeners.push({
                        element: t,
                        events: {
                            click: function(i) {
                                return t !== e.element || i.target === e.element || n.elementInside(i.target, e.element.querySelector(".dz-message")) ? e.hiddenFileInput.click() : void 0
                            }
                        }
                    })
                }
            }(this)), this.enable(), this.options.init.call(this)
        }, n.prototype.destroy = function() {
            var e;
            return this.disable(), this.removeAllFiles(!0), (null != (e = this.hiddenFileInput) ? e.parentNode : void 0) && (this.hiddenFileInput.parentNode.removeChild(this.hiddenFileInput), this.hiddenFileInput = null), delete this.element.dropzone, n.instances.splice(n.instances.indexOf(this), 1)
        }, n.prototype.updateTotalUploadProgress = function() {
            var e, t, n, i, o, r, s, l;
            if (i = 0, n = 0, e = this.getActiveFiles(), e.length) {
                for (l = this.getActiveFiles(), r = 0, s = l.length; s > r; r++) t = l[r], i += t.upload.bytesSent, n += t.upload.total;
                o = 100 * i / n
            } else o = 100;
            return this.emit("totaluploadprogress", o, n, i)
        }, n.prototype._getParamName = function(e) {
            return "function" == typeof this.options.paramName ? this.options.paramName(e) : "" + this.options.paramName + (this.options.uploadMultiple ? "[" + e + "]" : "")
        }, n.prototype.getFallbackForm = function() {
            var e, t, i, o;
            return (e = this.getExistingFallback()) ? e : (i = '<div class="dz-fallback">', this.options.dictFallbackText && (i += "<p>" + this.options.dictFallbackText + "</p>"), i += '<input type="file" name="' + this._getParamName(0) + '" ' + (this.options.uploadMultiple ? 'multiple="multiple"' : void 0) + ' /><input type="submit" value="Upload!"></div>', t = n.createElement(i), "FORM" !== this.element.tagName ? (o = n.createElement('<form action="' + this.options.url + '" enctype="multipart/form-data" method="' + this.options.method + '"></form>'), o.appendChild(t)) : (this.element.setAttribute("enctype", "multipart/form-data"), this.element.setAttribute("method", this.options.method)), null != o ? o : t)
        }, n.prototype.getExistingFallback = function() {
            var e, t, n, i, o, r;
            for (t = function(e) {
                    var t, n, i;
                    for (n = 0, i = e.length; i > n; n++)
                        if (t = e[n], /(^| )fallback($| )/.test(t.className)) return t
                }, r = ["div", "form"], i = 0, o = r.length; o > i; i++)
                if (n = r[i], e = t(this.element.getElementsByTagName(n))) return e
        }, n.prototype.setupEventListeners = function() {
            var e, t, n, i, o, r, s;
            for (r = this.listeners, s = [], i = 0, o = r.length; o > i; i++) e = r[i], s.push(function() {
                var i, o;
                i = e.events, o = [];
                for (t in i) n = i[t], o.push(e.element.addEventListener(t, n, !1));
                return o
            }());
            return s
        }, n.prototype.removeEventListeners = function() {
            var e, t, n, i, o, r, s;
            for (r = this.listeners, s = [], i = 0, o = r.length; o > i; i++) e = r[i], s.push(function() {
                var i, o;
                i = e.events, o = [];
                for (t in i) n = i[t], o.push(e.element.removeEventListener(t, n, !1));
                return o
            }());
            return s
        }, n.prototype.disable = function() {
            var e, t, n, i, o;
            for (this.clickableElements.forEach(function(e) {
                    return e.classList.remove("dz-clickable")
                }), this.removeEventListeners(), i = this.files, o = [], t = 0, n = i.length; n > t; t++) e = i[t], o.push(this.cancelUpload(e));
            return o
        }, n.prototype.enable = function() {
            return this.clickableElements.forEach(function(e) {
                return e.classList.add("dz-clickable")
            }), this.setupEventListeners()
        }, n.prototype.filesize = function(e) {
            var t, n, i, o, r, s, l, a;
            for (s = ["TB", "GB", "MB", "KB", "b"], i = o = null, n = l = 0, a = s.length; a > l; n = ++l)
                if (r = s[n], t = Math.pow(this.options.filesizeBase, 4 - n) / 10, e >= t) {
                    i = e / Math.pow(this.options.filesizeBase, 4 - n), o = r;
                    break
                }
            return i = Math.round(10 * i) / 10, "<strong>" + i + "</strong> " + o
        }, n.prototype._updateMaxFilesReachedClass = function() {
            return null != this.options.maxFiles && this.getAcceptedFiles().length >= this.options.maxFiles ? (this.getAcceptedFiles().length === this.options.maxFiles && this.emit("maxfilesreached", this.files), this.element.classList.add("dz-max-files-reached")) : this.element.classList.remove("dz-max-files-reached")
        }, n.prototype.drop = function(e) {
            var t, n;
            e.dataTransfer && (this.emit("drop", e), t = e.dataTransfer.files, t.length && (n = e.dataTransfer.items, n && n.length && null != n[0].webkitGetAsEntry ? this._addFilesFromItems(n) : this.handleFiles(t)))
        }, n.prototype.paste = function(e) {
            var t, n;
            if (null != (null != e && null != (n = e.clipboardData) ? n.items : void 0)) return this.emit("paste", e), t = e.clipboardData.items, t.length ? this._addFilesFromItems(t) : void 0
        }, n.prototype.handleFiles = function(e) {
            var t, n, i, o;
            for (o = [], n = 0, i = e.length; i > n; n++) t = e[n], o.push(this.addFile(t));
            return o
        }, n.prototype._addFilesFromItems = function(e) {
            var t, n, i, o, r;
            for (r = [], i = 0, o = e.length; o > i; i++) n = e[i], r.push(null != n.webkitGetAsEntry && (t = n.webkitGetAsEntry()) ? t.isFile ? this.addFile(n.getAsFile()) : t.isDirectory ? this._addFilesFromDirectory(t, t.name) : void 0 : null != n.getAsFile ? null == n.kind || "file" === n.kind ? this.addFile(n.getAsFile()) : void 0 : void 0);
            return r
        }, n.prototype._addFilesFromDirectory = function(e, t) {
            var n, i;
            return n = e.createReader(), i = function(e) {
                return function(n) {
                    var i, o, r;
                    for (o = 0, r = n.length; r > o; o++) i = n[o], i.isFile ? i.file(function(n) {
                        return e.options.ignoreHiddenFiles && "." === n.name.substring(0, 1) ? void 0 : (n.fullPath = "" + t + "/" + n.name, e.addFile(n))
                    }) : i.isDirectory && e._addFilesFromDirectory(i, "" + t + "/" + i.name)
                }
            }(this), n.readEntries(i, function(e) {
                return "undefined" != typeof console && null !== console && "function" == typeof console.log ? console.log(e) : void 0
            })
        }, n.prototype.accept = function(e, t) {
            return e.size > 1024 * this.options.maxFilesize * 1024 ? t(this.options.dictFileTooBig.replace("{{filesize}}", Math.round(e.size / 1024 / 10.24) / 100).replace("{{maxFilesize}}", this.options.maxFilesize)) : n.isValidFile(e, this.options.acceptedFiles) ? null != this.options.maxFiles && this.getAcceptedFiles().length >= this.options.maxFiles ? (t(this.options.dictMaxFilesExceeded.replace("{{maxFiles}}", this.options.maxFiles)), this.emit("maxfilesexceeded", e)) : this.options.accept.call(this, e, t) : t(this.options.dictInvalidFileType)
        }, n.prototype.addFile = function(e) {
            return e.upload = {
                progress: 0,
                total: e.size,
                bytesSent: 0
            }, this.files.push(e), e.status = n.ADDED, this.emit("addedfile", e), this._enqueueThumbnail(e), this.accept(e, function(t) {
                return function(n) {
                    return n ? (e.accepted = !1, t._errorProcessing([e], n)) : (e.accepted = !0, t.options.autoQueue && t.enqueueFile(e)), t._updateMaxFilesReachedClass()
                }
            }(this))
        }, n.prototype.enqueueFiles = function(e) {
            var t, n, i;
            for (n = 0, i = e.length; i > n; n++) t = e[n], this.enqueueFile(t);
            return null
        }, n.prototype.enqueueFile = function(e) {
            if (e.status !== n.ADDED || e.accepted !== !0) throw new Error("This file can't be queued because it has already been processed or was rejected.");
            return e.status = n.QUEUED, this.options.autoProcessQueue ? setTimeout(function(e) {
                return function() {
                    return e.processQueue()
                }
            }(this), 0) : void 0
        }, n.prototype._thumbnailQueue = [], n.prototype._processingThumbnail = !1, n.prototype._enqueueThumbnail = function(e) {
            return this.options.createImageThumbnails && e.type.match(/image.*/) && e.size <= 1024 * this.options.maxThumbnailFilesize * 1024 ? (this._thumbnailQueue.push(e), setTimeout(function(e) {
                return function() {
                    return e._processThumbnailQueue()
                }
            }(this), 0)) : void 0
        }, n.prototype._processThumbnailQueue = function() {
            return this._processingThumbnail || 0 === this._thumbnailQueue.length ? void 0 : (this._processingThumbnail = !0, this.createThumbnail(this._thumbnailQueue.shift(), function(e) {
                return function() {
                    return e._processingThumbnail = !1, e._processThumbnailQueue()
                }
            }(this)))
        }, n.prototype.removeFile = function(e) {
            return e.status === n.UPLOADING && this.cancelUpload(e), this.files = l(this.files, e), this.emit("removedfile", e), 0 === this.files.length ? this.emit("reset") : void 0
        }, n.prototype.removeAllFiles = function(e) {
            var t, i, o, r;
            for (null == e && (e = !1), r = this.files.slice(), i = 0, o = r.length; o > i; i++) t = r[i], (t.status !== n.UPLOADING || e) && this.removeFile(t);
            return null
        }, n.prototype.createThumbnail = function(e, t) {
            var n;
            return n = new FileReader, n.onload = function(i) {
                return function() {
                    return "image/svg+xml" === e.type ? (i.emit("thumbnail", e, n.result), void(null != t && t())) : i.createThumbnailFromUrl(e, n.result, t)
                }
            }(this), n.readAsDataURL(e)
        }, n.prototype.createThumbnailFromUrl = function(e, t, n) {
            var i;
            return i = document.createElement("img"), i.onload = function(t) {
                return function() {
                    var o, s, l, a, u, d, p, c;
                    return e.width = i.width, e.height = i.height, l = t.options.resize.call(t, e), null == l.trgWidth && (l.trgWidth = l.optWidth), null == l.trgHeight && (l.trgHeight = l.optHeight), o = document.createElement("canvas"), s = o.getContext("2d"), o.width = l.trgWidth, o.height = l.trgHeight, r(s, i, null != (u = l.srcX) ? u : 0, null != (d = l.srcY) ? d : 0, l.srcWidth, l.srcHeight, null != (p = l.trgX) ? p : 0, null != (c = l.trgY) ? c : 0, l.trgWidth, l.trgHeight), a = o.toDataURL("image/png"), t.emit("thumbnail", e, a), null != n ? n() : void 0
                }
            }(this), null != n && (i.onerror = n), i.src = t
        }, n.prototype.processQueue = function() {
            var e, t, n, i;
            if (t = this.options.parallelUploads, n = this.getUploadingFiles().length, e = n, !(n >= t) && (i = this.getQueuedFiles(), i.length > 0)) {
                if (this.options.uploadMultiple) return this.processFiles(i.slice(0, t - n));
                for (; t > e;) {
                    if (!i.length) return;
                    this.processFile(i.shift()), e++
                }
            }
        }, n.prototype.processFile = function(e) {
            return this.processFiles([e])
        }, n.prototype.processFiles = function(e) {
            var t, i, o;
            for (i = 0, o = e.length; o > i; i++) t = e[i], t.processing = !0, t.status = n.UPLOADING, this.emit("processing", t);
            return this.options.uploadMultiple && this.emit("processingmultiple", e), this.uploadFiles(e)
        }, n.prototype._getFilesWithXhr = function(e) {
            var t, n;
            return n = function() {
                var n, i, o, r;
                for (o = this.files, r = [], n = 0, i = o.length; i > n; n++) t = o[n], t.xhr === e && r.push(t);
                return r
            }.call(this)
        }, n.prototype.cancelUpload = function(e) {
            var t, i, o, r, s, l, a;
            if (e.status === n.UPLOADING) {
                for (i = this._getFilesWithXhr(e.xhr), o = 0, s = i.length; s > o; o++) t = i[o], t.status = n.CANCELED;
                for (e.xhr.abort(), r = 0, l = i.length; l > r; r++) t = i[r], this.emit("canceled", t);
                this.options.uploadMultiple && this.emit("canceledmultiple", i)
            } else((a = e.status) === n.ADDED || a === n.QUEUED) && (e.status = n.CANCELED, this.emit("canceled", e), this.options.uploadMultiple && this.emit("canceledmultiple", [e]));
            return this.options.autoProcessQueue ? this.processQueue() : void 0
        }, o = function() {
            var e, t;
            return t = arguments[0], e = 2 <= arguments.length ? a.call(arguments, 1) : [], "function" == typeof t ? t.apply(this, e) : t
        }, n.prototype.uploadFile = function(e) {
            return this.uploadFiles([e])
        }, n.prototype.uploadFiles = function(e) {
            var t, r, s, l, a, u, d, p, c, h, m, f, g, v, y, w, b, F, E, z, k, C, x, A, L, T, _, D, $, S, M, N, U, I;
            for (E = new XMLHttpRequest, z = 0, A = e.length; A > z; z++) t = e[z], t.xhr = E;
            f = o(this.options.method, e), b = o(this.options.url, e), E.open(f, b, !0), E.withCredentials = !!this.options.withCredentials, y = null, s = function(n) {
                return function() {
                    var i, o, r;
                    for (r = [], i = 0, o = e.length; o > i; i++) t = e[i], r.push(n._errorProcessing(e, y || n.options.dictResponseError.replace("{{statusCode}}", E.status), E));
                    return r
                }
            }(this), w = function(n) {
                return function(i) {
                    var o, r, s, l, a, u, d, p, c;
                    if (null != i)
                        for (r = 100 * i.loaded / i.total, s = 0, u = e.length; u > s; s++) t = e[s], t.upload = {
                            progress: r,
                            total: i.total,
                            bytesSent: i.loaded
                        };
                    else {
                        for (o = !0, r = 100, l = 0, d = e.length; d > l; l++) t = e[l], (100 !== t.upload.progress || t.upload.bytesSent !== t.upload.total) && (o = !1), t.upload.progress = r, t.upload.bytesSent = t.upload.total;
                        if (o) return
                    }
                    for (c = [], a = 0, p = e.length; p > a; a++) t = e[a], c.push(n.emit("uploadprogress", t, r, t.upload.bytesSent));
                    return c
                }
            }(this), E.onload = function(t) {
                return function(i) {
                    var o;
                    if (e[0].status !== n.CANCELED && 4 === E.readyState) {
                        if (y = E.responseText, E.getResponseHeader("content-type") && ~E.getResponseHeader("content-type").indexOf("application/json")) try {
                            y = JSON.parse(y)
                        } catch (r) {
                            i = r, y = "Invalid JSON response from server."
                        }
                        return w(), 200 <= (o = E.status) && 300 > o ? t._finished(e, y, i) : s()
                    }
                }
            }(this), E.onerror = function() {
                return function() {
                    return e[0].status !== n.CANCELED ? s() : void 0
                }
            }(this), v = null != ($ = E.upload) ? $ : E, v.onprogress = w, u = {
                Accept: "application/json",
                "Cache-Control": "no-cache",
                "X-Requested-With": "XMLHttpRequest"
            }, this.options.headers && i(u, this.options.headers);
            for (l in u) a = u[l], E.setRequestHeader(l, a);
            if (r = new FormData, this.options.params) {
                S = this.options.params;
                for (m in S) F = S[m], r.append(m, F)
            }
            for (k = 0, L = e.length; L > k; k++) t = e[k], this.emit("sending", t, E, r);
            if (this.options.uploadMultiple && this.emit("sendingmultiple", e, E, r), "FORM" === this.element.tagName)
                for (M = this.element.querySelectorAll("input, textarea, select, button"), C = 0, T = M.length; T > C; C++)
                    if (p = M[C], c = p.getAttribute("name"), h = p.getAttribute("type"), "SELECT" === p.tagName && p.hasAttribute("multiple"))
                        for (N = p.options, x = 0, _ = N.length; _ > x; x++) g = N[x], g.selected && r.append(c, g.value);
                    else(!h || "checkbox" !== (U = h.toLowerCase()) && "radio" !== U || p.checked) && r.append(c, p.value);
            for (d = D = 0, I = e.length - 1; I >= 0 ? I >= D : D >= I; d = I >= 0 ? ++D : --D) r.append(this._getParamName(d), e[d], e[d].name);
            return E.send(r)
        }, n.prototype._finished = function(e, t, i) {
            var o, r, s;
            for (r = 0, s = e.length; s > r; r++) o = e[r], o.status = n.SUCCESS, this.emit("success", o, t, i), this.emit("complete", o);
            return this.options.uploadMultiple && (this.emit("successmultiple", e, t, i), this.emit("completemultiple", e)), this.options.autoProcessQueue ? this.processQueue() : void 0
        }, n.prototype._errorProcessing = function(e, t, i) {
            var o, r, s;
            for (r = 0, s = e.length; s > r; r++) o = e[r], o.status = n.ERROR, this.emit("error", o, t, i), this.emit("complete", o);
            return this.options.uploadMultiple && (this.emit("errormultiple", e, t, i), this.emit("completemultiple", e)), this.options.autoProcessQueue ? this.processQueue() : void 0
        }, n
    }(t), e.version = "4.0.1", e.options = {}, e.optionsForElement = function(t) {
        return t.getAttribute("id") ? e.options[n(t.getAttribute("id"))] : void 0
    }, e.instances = [], e.forElement = function(e) {
        if ("string" == typeof e && (e = document.querySelector(e)), null == (null != e ? e.dropzone : void 0)) throw new Error("No Dropzone found for given element. This is probably because you're trying to access it before Dropzone had the time to initialize. Use the `init` option to setup any additional observers on your Dropzone.");
        return e.dropzone
    }, e.autoDiscover = !0, e.discover = function() {
        var t, n, i, o, r, s;
        for (document.querySelectorAll ? i = document.querySelectorAll(".dropzone") : (i = [], t = function(e) {
                var t, n, o, r;
                for (r = [], n = 0, o = e.length; o > n; n++) t = e[n], r.push(/(^| )dropzone($| )/.test(t.className) ? i.push(t) : void 0);
                return r
            }, t(document.getElementsByTagName("div")), t(document.getElementsByTagName("form"))), s = [], o = 0, r = i.length; r > o; o++) n = i[o], s.push(e.optionsForElement(n) !== !1 ? new e(n) : void 0);
        return s
    }, e.blacklistedBrowsers = [/opera.*Macintosh.*version\/12/i], e.isBrowserSupported = function() {
        var t, n, i, o, r;
        if (t = !0, window.File && window.FileReader && window.FileList && window.Blob && window.FormData && document.querySelector)
            if ("classList" in document.createElement("a"))
                for (r = e.blacklistedBrowsers, i = 0, o = r.length; o > i; i++) n = r[i], n.test(navigator.userAgent) && (t = !1);
            else t = !1;
        else t = !1;
        return t
    }, l = function(e, t) {
        var n, i, o, r;
        for (r = [], i = 0, o = e.length; o > i; i++) n = e[i], n !== t && r.push(n);
        return r
    }, n = function(e) {
        return e.replace(/[\-_](\w)/g, function(e) {
            return e.charAt(1).toUpperCase()
        })
    }, e.createElement = function(e) {
        var t;
        return t = document.createElement("div"), t.innerHTML = e, t.childNodes[0]
    }, e.elementInside = function(e, t) {
        if (e === t) return !0;
        for (; e = e.parentNode;)
            if (e === t) return !0;
        return !1
    }, e.getElement = function(e, t) {
        var n;
        if ("string" == typeof e ? n = document.querySelector(e) : null != e.nodeType && (n = e), null == n) throw new Error("Invalid `" + t + "` option provided. Please provide a CSS selector or a plain HTML element.");
        return n
    }, e.getElements = function(e, t) {
        var n, i, o, r, s, l, a, u;
        if (e instanceof Array) {
            o = [];
            try {
                for (r = 0, l = e.length; l > r; r++) i = e[r], o.push(this.getElement(i, t))
            } catch (d) {
                n = d, o = null
            }
        } else if ("string" == typeof e)
            for (o = [], u = document.querySelectorAll(e), s = 0, a = u.length; a > s; s++) i = u[s], o.push(i);
        else null != e.nodeType && (o = [e]);
        if (null == o || !o.length) throw new Error("Invalid `" + t + "` option provided. Please provide a CSS selector, a plain HTML element or a list of those.");
        return o
    }, e.confirm = function(e, t, n) {
        return window.confirm(e) ? t() : null != n ? n() : void 0
    }, e.isValidFile = function(e, t) {
        var n, i, o, r, s;
        if (!t) return !0;
        for (t = t.split(","), i = e.type, n = i.replace(/\/.*$/, ""), r = 0, s = t.length; s > r; r++)
            if (o = t[r], o = o.trim(), "." === o.charAt(0)) {
                if (-1 !== e.name.toLowerCase().indexOf(o.toLowerCase(), e.name.length - o.length)) return !0
            } else if (/\/\*$/.test(o)) {
            if (n === o.replace(/\/.*$/, "")) return !0
        } else if (i === o) return !0;
        return !1
    }, "undefined" != typeof jQuery && null !== jQuery && (jQuery.fn.dropzone = function(t) {
        return this.each(function() {
            return new e(this, t)
        })
    }), "undefined" != typeof module && null !== module ? module.exports = e : window.Dropzone = e, e.ADDED = "added", e.QUEUED = "queued", e.ACCEPTED = e.QUEUED, e.UPLOADING = "uploading", e.PROCESSING = e.UPLOADING, e.CANCELED = "canceled", e.ERROR = "error", e.SUCCESS = "success", o = function(e) {
        var t, n, i, o, r, s, l, a, u, d;
        for (l = e.naturalWidth, s = e.naturalHeight, n = document.createElement("canvas"), n.width = 1, n.height = s, i = n.getContext("2d"), i.drawImage(e, 0, 0), o = i.getImageData(0, 0, 1, s).data, d = 0, r = s, a = s; a > d;) t = o[4 * (a - 1) + 3], 0 === t ? r = a : d = a, a = r + d >> 1;
        return u = a / s, 0 === u ? 1 : u
    }, r = function(e, t, n, i, r, s, l, a, u, d) {
        var p;
        return p = o(t), e.drawImage(t, n, i, r, s, l, a, u, d / p)
    }, i = function(e, t) {
        var n, i, o, r, s, l, a, u, d;
        if (o = !1, d = !0, i = e.document, u = i.documentElement, n = i.addEventListener ? "addEventListener" : "attachEvent", a = i.addEventListener ? "removeEventListener" : "detachEvent", l = i.addEventListener ? "" : "on", r = function(n) {
                return "readystatechange" !== n.type || "complete" === i.readyState ? (("load" === n.type ? e : i)[a](l + n.type, r, !1), !o && (o = !0) ? t.call(e, n.type || n) : void 0) : void 0
            }, s = function() {
                var e;
                try {
                    u.doScroll("left")
                } catch (t) {
                    return e = t, void setTimeout(s, 50)
                }
                return r("poll")
            }, "complete" !== i.readyState) {
            if (i.createEventObject && u.doScroll) {
                try {
                    d = !e.frameElement
                } catch (p) {}
                d && s()
            }
            return i[n](l + "DOMContentLoaded", r, !1), i[n](l + "readystatechange", r, !1), e[n](l + "load", r, !1)
        }
    }, e._autoDiscoverFunction = function() {
        return e.autoDiscover ? e.discover() : void 0
    }, i(window, e._autoDiscoverFunction)
}).call(this),
    function() {
        window.Form = function() {
            function e() {}
            return e.enableButton = function(e, t) {
                return null == t && (t = ".btn-success"), $(t).prop("disabled", !1), $(t).val(e), $(t).removeAttr("data-disable-with")
            }, e.disableButton = function(e, t) {
                return null == t && (t = ".btn-success"), $(t).prop("disabled", !0), $(t).val(e), $(t).attr("data-disable-with", e)
            }, e.enableA = function(e, t) {
                return t ? (t.removeAttr("disabled"), t.html(e), t.removeAttr("data-disable-with")) : void 0
            }, e.disableA = function(e, t) {
                return t ? (t.attr("disabled", !0), t.html(e), t.attr("data-disable-with", e)) : void 0
            }, e.addHandlers = function(t) {
                return null == t && (t = "Save & Continue"), $(window).bind("unload", function() {
                    return e.enableButton(t)
                }), $(window).bind("pageshow", function(e) {
                    return e.originalEvent.persisted ? (document.body.style.display = "none", location.reload()) : void 0
                })
            }, e
        }()
    }.call(this),
    function() {
        $(function() {
            var e, t;
            e = $("#myModal"), t = e.find(".modal-body"), $("#documents-table tr#table_tr").length > 0 || $(".js-no-files").show(), $(document).undelegate("#notify-hpa-after-upload", "click").delegate("#notify-hpa-after-upload", "click", function() {
                var e;
                return e = $(this), e.attr("disabled") ? !1 : (e.attr("disabled", !0), $.ajax({
                    type: "POST",
                    url: "/documents/notify",
                    dataType: "json",
                    beforeSend: function() {
                        return $("#notify-hpa-after-upload").attr("disabled", !0)
                    },
                    success: function(e) {
                        return $.notify("" === e.error ? {
                            message: "Notifcation send successful",
                            status: "success",
                            timeout: "3000"
                        } : {
                            message: "Notifcation send failed",
                            status: "warning",
                            timeout: "3000"
                        })
                    },
                    error: function() {
                        return $.notify({
                            message: "Server Error",
                            status: "warning",
                            timeout: "3000"
                        })
                    },
                    complete: function() {
                        return e.removeAttr("disabled")
                    }
                }))
            })
        }), window.Documents = function() {
            function e() {
                $(function(e) {
                    return function() {
                        var t;
                        Form.addHandlers("Finalize your submission"), Dropzone.options.myAwesomeDropzone = {
                            paramName: "file",
                            maxFilesize: 10,
                            method: "POST",
                            url: "/documents/upload",
                            uploadMultiple: !0,
                            previewsContainer: ".preview-files",
                            autoProcessQueue: !1,
                            parallelUploads: 1,
                            previewTemplate: document.querySelector("#preview-template").innerHTML,
                            dictDefaultMessage: "Click here or drop files here to upload",
                            acceptedFiles: "image/*,application/pdf,.psd,.docx,.doc,.dotx,.txt,.rtf,.tif,.bmp,.xlsx,.xls,.zip,.csv,.html"
                        }, t = new Dropzone("#fileupload", Dropzone.options.myAwesomeDropzone), t.on("addedfile", function(n) {
                            var i, o, r, s, l, a;
                            return $("#start-upload").attr("style", "display: inline-block"), /.*[\u4e00-\u9fa5]|%+.*$/.test(n.name) && ($(n.previewElement).addClass("dz-error"), $(n.previewElement).find(".dz-error-message").text("Filename Invaild!")), s = $.trim(e.formateFileName(n)), l = (new Date).valueOf(), r = e.createCustomDocumentType(s, l), i = e.createCustomAnnualAmount(s, l), a = Dropzone.createElement(r), o = Dropzone.createElement(i), $(n.previewElement.querySelector("div.dz-custom")).append(a), $(n.previewElement.querySelector("div.dz-custom")).append(o), e.maskAnnualAmountInputFields(), e.hideAllErrorMessage(), Form.enableA('<span><i class="glyphicon glyphicon-upload"></i> Upload Now</span>', $("#start-upload")), 0 === n.size ? t.removeFile(n) : void 0
                        }), t.on("error", function(e, t, n) {
                            return "undefined" != typeof n && 200 !== n.status ? $(e.previewElement).find(".dz-error-message").text("Server Error!") : void 0
                        }), t.on("sending", function(e, t, n) {
                            var i, o;
                            return $(".dz-default.dz-message").hide(), i = $(e.previewElement.querySelector(".annual-amount")).val(), o = $(e.previewElement.querySelector(".property-document-type")).val(), n.append("propertyDocumentTypeId", o), n.append("Amount", i)
                        }), t.on("removedfile", function() {
                            return 0 === e.numberOfPreviewFiles() ? ($("#start-upload").hide(), e.hideAllErrorMessage(), Form.disableA('<span><i class="glyphicon glyphicon-upload"></i> Upload Now</span>', $("#start-upload"))) : void 0
                        }), t.on("success", function(n, i) {
                            return e.hideNoFilesMessage(), e.showLoadingIco(), "Success" === i.Status ? t.removeFile(n) : void 0
                        }), t.on("queuecomplete", function() {
                            return t.options.autoProcessQueue = !1, Form.disableA('<span><i class="glyphicon glyphicon-upload"></i> Upload Now</span>', $("#start-upload")), e.hideAllErrorMessage(), $.ajax({
                                type: "GET",
                                data: "status=refresh",
                                url: "/documents",
                                dataType: "json",
                                success: function(n) {
                                    var i;
                                    return "" === n.error ? ($.isEmptyObject(n.files[0]) || (i = "", $("#server-error-message").hide(), $.each(n.files, function(e, t) {
                                        return i += "<tr id='table_tr'> <td class='text-center'><span class='number'></span></td> <td><p class='name' title='" + t.name + "'>" + t.name + "</p></td> <td><span class='document-type'>" + t.type + "</span></td> <td><span class='annual-amount'>" + t.annual_amount + "</span></td> <td><span class='size'>" + t.size + "</span></td> <td class='text-center'>", i += "<a href='" + t.downloadUrl + "' data-method='" + t.downloadType + "' target='_blank' class='text-gray action js-download'><i class='glyphicon glyphicon-download'></i></a>", n.cannot_delete || (i += "<a href='javascript:void(0);' id='" + t.id + "' class='text-gray action js-delete'><i class='glyphicon glyphicon-trash'></i></a>"), i += "</td></tr>"
                                    }), e.showNotifyHpaButton()), e.hiddenLoadingIco(), $("#documents-table tbody").children("#table_tr").remove(), $("#documents-table tbody").children(".js-no-files").before(i), $(".dz-default.dz-message").show()) : (e.hiddenLoadingIco(), $("#documents-table tbody").children("#table_tr").remove(), $("#server-error-message").show(), t.disable())
                                },
                                error: function() {
                                    return e.hiddenLoadingIco(), $("#documents-table tbody").children("#table_tr").remove(), $("#server-error-message").show(), t.disable()
                                }
                            })
                        }), $("#start-upload").off().on("click", function() {
                            var n, i;
                            n = t.getActiveFiles();
                            for (i in n) $(n[i].previewElement).hasClass("dz-error") && t.removeFile(n[i]);
                            return e.numberOfPreviewFiles() > 0 ? (Form.disableA("Uploading...", $("#start-upload")), t.options.autoProcessQueue = !0, t.processQueue()) : void 0
                        }), $(document).undelegate("#js-confirm", "click").delegate("#js-confirm", "click", function() {
                            var n, i, o;
                            return i = $("#myModal"), t.disable(), o = i.find("#delete_document_id").val(), n = $("a[id='" + o + "']"), e.disableDeleteButtons(), n.html($("#ajax-loader").clone(!0)), $.ajax({
                                type: "DELETE",
                                data: "file=" + o,
                                url: "/documents",
                                dataType: "json",
                                beforeSend: function() {
                                    return i.modal("hide")
                                },
                                success: function(i) {
                                    return "" === i.error ? n.parents("tr").remove() : (n.siblings(".server-error").remove(), n.after("<p class='server-error text-danger'>Server Error</p>")), n.html('<i class="glyphicon glyphicon-trash"></i>'), e.enableDeleteButtons(), t.enable(), e.hiddenNotifyHpaButton(), e.showNoFilesMessage(), t.options.autoProcessQueue = !1, t.options.uploadMultiple = !0
                                },
                                error: function() {
                                    return n.html('<i class="glyphicon glyphicon-trash"></i>'), n.siblings(".server-error").remove(), n.after("<p class='server-error text-danger'>Server Error</p>"), e.enableDeleteButtons(), t.enable(), e.showNoFilesMessage(), t.options.autoProcessQueue = !1, t.options.uploadMultiple = !0
                                }
                            })
                        }), $(document).undelegate(".js-delete", "click").delegate(".js-delete", "click", function() {
                            var e, t;
                            e = $(this), t = $("#myModal"), t.find(".modal-title").html("Confirm"), $("#delete_document_id").val(e[0].id), t.find(".modal-body").html($("#delete_document_body_tpl").html()), t.modal("show")
                        })
                    }
                }(this))
            }
            return e.prototype.hideAllErrorMessage = function() {
                return this.hideUploadErrorMessage()
            }, e.prototype.disableDeleteButtons = function() {
                return $("a.action.delete").attr("ajax-loading", !0)
            }, e.prototype.enableDeleteButtons = function() {
                return $("a.action.delete").removeAttr("ajax-loading")
            }, e.prototype.showUploadErrorMessage = function() {
                return $("#upload-error-message").show()
            }, e.prototype.hideUploadErrorMessage = function() {
                return $("#upload-error-message").hide()
            }, e.prototype.numberOfPreviewFiles = function() {
                return $(".preview-files .dz-preview").not(".dz-error").length
            }, e.prototype.maskAnnualAmountInputFields = function() {
                return $("input.annual-amount.money").last().inputmask("currency", {
                    rightAlign: !1,
                    digits: 0,
                    removeMaskOnSubmit: !0,
                    max: 99999999,
                    min: 0,
                    autoUnmask: !0,
                    showMaskOnFocus: !0
                })
            }, e.prototype.showLoadingIco = function() {
                return $("#hidden-loading").show()
            }, e.prototype.hiddenLoadingIco = function() {
                return $("#hidden-loading").hide()
            }, e.prototype.showNoFilesMessage = function() {
                return $("#documents-table tr#table_tr").length <= 0 ? $(".js-no-files").show() : void 0
            }, e.prototype.hideNoFilesMessage = function() {
                return $(".js-no-files").hide()
            }, e.prototype.numberOfUploadedFiles = function() {
                return $("#documents-table tr#table_tr").length
            }, e.prototype.formateFileName = function(e) {
                var t, n;
                return n = function() {
                    try {
                        return decodeURIComponent(e.name).replace(/([^A-Za-z0-9\.-_]|[\[\]])/gi, "")
                    } catch (n) {
                        return t = n, e.name.replace(/([^A-Za-z0-9\.-_]|[\[\]])/gi, "")
                    }
                }(), n.indexOf("/") ? n = n.split("/").pop() : void 0
            }, e.prototype.createCustomDocumentType = function(e, t) {
                var n, i, o;
                return o = ["Paystub", "Bank Statement", "Tax Return with 1099/W2", "Offer Letter", "Profit and Loss Statement (Business Owners)", "Other"], i = [2, 3, 4, 5, 6, 7], n = "<select style='max-width:100%' name='" + e + "_propertyDocumentTypeId_" + t + "' class='form-control property-document-type'>", $.each(o, function(e, t) {
                    return e = i[o.indexOf(t)], n += "<option value=" + e + ">" + t + "</option>"
                }), n += "</select>"
            }, e.prototype.createCustomAnnualAmount = function(e, t) {
                return "<input name='" + e + "_Amount_" + t + "' placeholder='Annual Amount' class='form-control numeric money decimal narrow annual-amount'>"
            }, e.prototype.showNotifyHpaButton = function() {
                return $("#documents-table tr#table_tr").length > 0 ? $("#notify-hpa-after-upload").removeAttr("disabled") : void 0
            }, e.prototype.hiddenNotifyHpaButton = function() {
                return $("#documents-table tr#table_tr").length <= 0 ? $("#notify-hpa-after-upload").attr("disabled", !0) : void 0
            }, e
        }()
    }.call(this);