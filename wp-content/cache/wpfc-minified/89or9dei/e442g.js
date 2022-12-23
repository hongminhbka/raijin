// source --> http://raijin.howizbiz.com/wp-content/cache/autoptimize/js/autoptimize_single_eb1adf1ce003d90f5a277ef1155a397b.js?ver=5.2.3 
(function($){'use strict'
var $=window.jQuery
var Waypoint=window.Waypoint
function Sticky(options){this.options=$.extend({},Waypoint.defaults,Sticky.defaults,options)
this.element=this.options.element
this.$element=$(this.element)
this.createWrapper()
this.createWaypoint()}
Sticky.prototype.createWaypoint=function(){var originalHandler=this.options.handler
this.waypoint=new Waypoint($.extend({},this.options,{element:this.wrapper,handler:$.proxy(function(direction){var shouldBeStuck=this.options.direction.indexOf(direction)>-1
var wrapperHeight=shouldBeStuck?this.$element.outerHeight(true):''
this.$wrapper.height(wrapperHeight)
this.$element.toggleClass(this.options.stuckClass,shouldBeStuck)
if(originalHandler){originalHandler.call(this,direction)}},this),offset:0}))}
Sticky.prototype.createWrapper=function(){if(this.options.wrapper){this.$element.wrap(this.options.wrapper)}
this.$wrapper=this.$element.parent()
this.wrapper=this.$wrapper[0]}
Sticky.prototype.destroy=function(){if(this.$element.parent()[0]===this.wrapper){this.waypoint.destroy()
this.$element.removeClass(this.options.stuckClass)
if(this.options.wrapper){this.$element.unwrap()}}}
$(document).ready(function(){Sticky.defaults={wrapper:'<div class="sticky-wrapper" />',stuckClass:'stuck',direction:'down right'}
Waypoint.Sticky=Sticky});})(jQuery);