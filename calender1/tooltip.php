<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <style>
  /*          body {
  margin: 0;
  background-color: #359;
}

.form-box {
  position: relative;
  width: 400px;
  padding: 50px 60px;
  margin: 5% auto;
  background-color: rgb(240, 230, 255);
  border-radius: 10px;
  text-align: center;
}

.form-box > input[type='text'] {
  box-sizing: border-box;
  padding: 8px;
  border-radius: 5px;
  outline: none;
  border: 2px solid #aaa;
  transition: all 0.2s ease-out;
}

.form-box > input:focus {
   border-color: dodgerblue;
   box-shadow: 0 0 8px 0 dodgerblue;
}*/

/* Tooltip Styles */

.tooltip {
  position: relative;
  padding: 5px 10px;
  margin-left: 15px;
  margin-right: 15px;
  background-color: rgb(56, 56, 56);
  border-radius: 50%;
  color: #fff;
  cursor: help;
  transition: all 0.2s ease-out;
}

.tooltip:hover {
  box-shadow: 0 0 6px 0 black;
}


.tooltip::before, .tooltip::after {
   position: absolute;
   left: 50%;
   opacity: 0;
   transition: all 0.2s ease-out;
}

.tooltip::before {
  content: "";
  border-width: 5px 4px 0 5px;
  border-style: solid;
  border-color: rgba(56, 56, 56, 0.8) transparent;
  margin-left: -4px;
  top: -8px;
}

.tooltip::after {
  content: attr(data-tooltip);
  top: -8px;
  width: 150px;
  margin-left: -75px;
  padding: 5px;
  font-size: 12px;
  background-color: rgba(56, 56, 56, 0.8);
  border-radius: 4px;
  transform: translate3d(0, -100%, 0);
  pointer-events: none;
}

/* 4 tooltip positions */

.tooltip[data-tooltip-position='left']::before {
  margin-left: -21px;
  top: 12px;
  transform: rotate(-90deg);
}

.tooltip[data-tooltip-position='left']::after {
  transform: translate3d(-65%, 40%, 0);
}

.tooltip[data-tooltip-position='right']::before {
  margin-left: 14px;
  top: 12px;
  transform: rotate(90deg);
}

.tooltip[data-tooltip-position='right']::after {
  transform: translate3d(60%, 40%, 0);
}

.tooltip[data-tooltip-position='bottom']::before {
  margin-left: -4px;
  top: 32px;
  transform: rotate(-180deg);
}

.tooltip[data-tooltip-position='bottom']::after {
  transform: translate3d(0, 186%, 0);
}

/* end of 4 tooltip positions */

.tooltip:hover::before, .tooltip:hover::after {
  opacity: 1;
}
        </style>
    </head>
    <body>
        <div class="form-box">

            <span 
                  class="tooltip"
                  data-tooltip-position="left"
                  data-tooltip="Only gmail will be accepted!">?</span>

            <span 
                  class="tooltip"
                  data-tooltip-position="up"
                  data-tooltip="Only gmail will be accepted!">?</span>

            <input type="text" class="input" placeholder="Email">



            <span 
                  class="tooltip"
                  data-tooltip-position="bottom"
                  data-tooltip="Only gmail will be accepted!">?</span>    

            <span 
                  class="tooltip"
                  data-tooltip-position="right"
                  data-tooltip="Only gmail will be accepted!">?</span>

        </div>
    </body>
</html>