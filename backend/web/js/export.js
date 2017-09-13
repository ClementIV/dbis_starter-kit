
  // function method1(table_id) //整个表格拷贝到Excel中
  //   { //创建 AX 对象 excel
  //       var curTbl = document.getElementById(table_id);
  //       var oXL = new ActiveXObject("Excel.Application");
  //       //获取 workbook 对象
  //       var oWB = oXL.Workbooks.Add();
  //       //激活当前 sheet
  //       var oSheet = oWb.ActiveSheet;
  //       // 把表格内容移到 TextRange 中
  //       var sel = document.body.createTextRange();
  //       sel.moveToElementText(curTbl);
  //       // 全选 TextRange 中内容
  //       sel.select();
  //       // 复制 TextRange 中内容
  //       oSheet.execCommand("Copy");
  //       // 粘贴到活动的 EXCEL 中
  //       oSheet.Paste();
  //       //设置 Excel 可见属性
  //       oXL.Visible = true;
  //   }
    function method3(){
        alert("test!");
    }
    // function method2(table_id) { //读取表格中的每个单元到 Excel
    //     var curTbl = document.getElementById(table_id);
    //     //创建 AX 对象 excel
    //     var oXL = new ActiveXObject("Excel.Application");
    //     //获取 workbook 对象
    //     var oWB = oXL.WorkBooks.Add();
    //     // 激活当前 sheet
    //     var oSheet = oWB.ActiveSheet;
    //     // 取得表格行数
    //     var Lenr = curTbl.rows.length;
    //     for (i = 0; i < Lenr; i++) {
    //         // 取得每行的列数
    //         for (j = 0; j < Lenc; j++) {
    //             //赋值
    //             oSheet.Cells(i + 1, j + 1).value = curTbl.row(i).cells(j).innerText;
    //         }
    //     }
    //     //设置 Excel 可见属性
    //     oXL.Visible = true;
    //     oXl.save(table_id + ".xlsx");
    // }

    function getXlsFromTbl(inTblid, inWindow) {
        try {
            var allStr = "";
            var curStr = "";
            if (inTblid != null && inTblid != "" && inTblid != "null") {
                curStr = getTblData(inTblid, inWindow);
            }
            //alert(curStr);
            if (curStr != null) {
                allStr += curStr;
            } else {
                alert("你要导出的表不存在！");
                return;
            }
            var fileName = getExcelFileName();
            doFileExport(fileName,allStr);

        } catch (e) {
            alert("导出发生异常：" + e.name + "->" + e.description + "!");
        }
    }

    function getTblData(inTbl, inWindow) {
        var rows = 0;
        var tblDocument = document;
        if (inWindow && inWindow != "") {
            if (!document.all(inWindow)) {
                return null;
            } else {
                tblDocument = eval(inWindow).document;
            }
        }
        var curTbl = tblDocument.getElementById(inTbl);
        var outStr = "";
        if (curTbl != null) {
            for (var j = 0; j < curTbl.rows.length; j++) {
                for (var i = 0; i < curTbl.rows[j].cells.length; i++) {
                    if (i == 0 && rows > 0) {
                        outStr += "\t";
                        rows -= 1;
                    }
                    outStr += curTbl.rows[j].cells[i].innerText + "\t";
                    if (curTbl.rows[j].cells[i].colSpan > 1) {
                        for (var k = 0; k < curTbl.rows[j].cells[i].colSpan - 1; k++) {
                            outStr += "\t";
                        }
                    }
                    if (i == 0) {
                        if (rows == 0 && curTbl.rows[j].cells[i].rowSpan > 1) {
                            rows = curTbl.rows[j].cells[i].rowSpan - 1;
                        }
                    }
                }
                outStr += "\r\n";
            }
        } else {
            outStr = null;
            alert(inTbl + "不存在！");
        }
        return outStr;
    }

    function reSetForm( curTime) {
        //alert(curTime);
        if (curTime.length == 1) {
            curTime = "0" + curTime;
        }
        return curTime;
    }

    function getExcelFileName() {
        var d = new Date();
        var curYear = d.getYear();
        var curMonth = reSetForm("" + (d.getMonth() + 1));
        var curDate = reSetForm("" + d.getDate());
        var curHour = reSetForm("" + d.getHours());
        var curMinute = reSetForm("" + d.getMinutes());
        var curSecond = reSetForm("" + d.getSeconds());
        var fileName = curYear + curMonth + curDate + "_" + curHour + curMinute + curSecond + ".csv";
        //alert(fileName);
        return fileName;

    }

    function doFileExport(inName, inStr) {
        var xlsWin = null;
        // /alert(document.all("glbHideFrm"));
        // if (document.all("glbHideFrm")) {
        //     xlsWin = glbHideFrm;
        // } else {
        {    var width = 60;
            var height = 40;
            var openPara = "left=" + (window.screen.width / 2 - width / 2) +
                ",top=" + (window.screen.height / 2 - height / 2) + ",scrollbars=no,width=" + width +
                ",height=" + height;
                alert(inStr);
             xlsWin = window.open("", "_blank", openPara);

        }
        //
         xlsWin.document.write(inStr);
         xlsWin.document.close();
         xlsWin.document.execCommand('SaveAs',true,inName);
         //xlsWin.close();
    }
    var idTmr;
    function  getExplorer() {
        var explorer = window.navigator.userAgent ;
        //ie
        if (explorer.indexOf("MSIE") >= 0) {
            return 'ie';
        }
        //firefox
        else if (explorer.indexOf("Firefox") >= 0) {
            return 'Firefox';
        }
        //Chrome
        else if(explorer.indexOf("Chrome") >= 0){
            return 'Chrome';
        }
        //Opera
        else if(explorer.indexOf("Opera") >= 0){
            return 'Opera';
        }
        //Safari
        else if(explorer.indexOf("Safari") >= 0){
            return 'Safari';
        }
    }
    function method1(tableid) {//整个表格拷贝到EXCEL中
        if(getExplorer()=='ie')
        {
            var curTbl = document.getElementById(tableid);
            var oXL = new ActiveXObject("Excel.Application");

            //创建AX对象excel
            var oWB = oXL.Workbooks.Add();
            //获取workbook对象
            var xlsheet = oWB.Worksheets(1);
            //激活当前sheet
            var sel = document.body.createTextRange();
            sel.moveToElementText(curTbl);
            //把表格中的内容移到TextRange中
            sel.select();
            //全选TextRange中内容
            sel.execCommand("Copy");
            //复制TextRange中内容
            xlsheet.Paste();
            //粘贴到活动的EXCEL中
            oXL.Visible = true;
            //设置excel可见属性

            try {
                var fname = oXL.Application.GetSaveAsFilename("Excel.xls", "Excel Spreadsheets (*.xls), *.xls");
            } catch (e) {
                print("Nested catch caught " + e);
            } finally {
                oWB.SaveAs(fname);

                oWB.Close(savechanges = false);
                //xls.visible = false;
                oXL.Quit();
                oXL = null;
                //结束excel进程，退出完成
                //window.setInterval("Cleanup();",1);
                idTmr = window.setInterval("Cleanup();", 1);

            }

        }
        else
        {
            tableToExcel(tableid,'ss');
        }
    }
    function Cleanup() {
        window.clearInterval(idTmr);
        CollectGarbage();
    }
    var tableToExcel = (function() {
        var uri = 'data:application/vnd.ms-excel;base64,',
        template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>',
        base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) },
        format = function(s, c) {
            return s.replace(/{(\w+)}/g,
            function(m, p) { return c[p]; }) }
                return function(table, name) {
                    if (!table.nodeType) table = document.getElementById(table)
                    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
                    window.location.href = uri + base64(format(template, ctx))
                  }
    })();
