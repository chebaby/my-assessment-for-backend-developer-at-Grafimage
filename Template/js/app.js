/*!
 * JDE
 * @author Nour-Eddine ECH-CHEBABY
 * @version 1.0.0
 * Copyright 2017. ISC licensed.
 */
jQuery(document).ready(function(e){var o=e(".sector input:radio"),i=e('.sector input:radio[id="other"]');o.change(function(){var o=e('.sector input:text[id="sector"]');return i.is(":checked")?void o.prop("disabled",!1).focus():void o.prop("disabled",!0).val("")});var r=e(".questions input:radio"),t=e('.questions input:radio[id="question-2-yes"]');r.change(function(){var o=e(".questions textarea#question-2-other");return t.is(":checked")?void o.prop("disabled",!1).focus():void o.prop("disabled",!0).val("")}),e("form#survey").parsley().on("field:validated",function(){var o=0===e(".parsley-error").length;e(".bs-callout-info").toggleClass("hidden",!o),e(".bs-callout-warning").toggleClass("hidden",o)}).on("form:submit",function(){})});