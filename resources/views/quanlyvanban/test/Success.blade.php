<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="{{url('angularjs/select.css')}}">

  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular-sanitize.js"></script>

    <!-- themes -->
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.4.5/select2.css">    
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.8.5/css/selectize.default.css">
    <script type="text/javascript" src="{{url('angularjs/demo.js')}}"></script>
  <script type="text/javascript" src="{{url('angularjs/select.js')}}"></script>
</head>
<body>
<h1>Multiple Selection</h1>

  <h3>Array of strings</h3>
  <ui-select multiple ng-model="ctrl.multipleDemo.colors" theme="bootstrap" ng-disabled="ctrl.disabled" close-on-select="false" style="width: 300px;" title="Choose a color">
    <ui-select-match placeholder="Select colors..."><%$item%></ui-select-match>
    <ui-select-choices repeat="color in ctrl.availableColors | filter:$select.search">
      <%color%>
    </ui-select-choices>
  </ui-select>
  <p>Selected: <%ctrl.multipleDemo.colors%></p>
</body>
</html>