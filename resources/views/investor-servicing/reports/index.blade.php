@extends('investor-servicing.reports.main-template')
@section('title', "Reports > Investor Servicing")

@section('body')

<div class="card margin-top-m">
                    <div class="card-title blue">
                        <h5>Reports</h5></div>
                    <div class="card-content">
                        <p>First, define report period’s month or quarter, define its’ year, then hit Submit. Quarterly reports will available to view in your Investor Servicing portal witin 48 hours.</p>
                        <div class="card grey margin-top-m">
                            <div class="card-content">
                            <form action="/reports/create/new" method="post">
                                @csrf
                                <input type="hidden" name="did" value="{{$id}}" />
                                <input type="hidden" name="tid" value="{{$type}}" />
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6 margin-bottom-m-md padding-right-l-lg border-right-lg">
                                            <div class="card equal-padding margin-bottom-m">
                                                <div class="row middle-xs">
                                                    <div class="col-xs-12 col-sm-5">
                                                        <div class="row middle-xs">
                                                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 text-left">
                                                                <p class="no-margin">Month:</p>
                                                            </div>
                                                            <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8">
                                                                <input type="text" name="month" value="{{ isset($data['month']) ? $data['month'] : '' }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-2 text-center">
                                                        <p class="no-margin">or</p>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-5">
                                                        <div class="row middle-xs">
                                                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 text-left">
                                                                <p class="no-margin">Quarter:</p>
                                                            </div>
                                                            <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8">
                                                                <input type="text" name="quater" value="{{ isset($data['quater']) ? $data['quater'] : '' }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card equal-padding margin-bottom-m">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 text-left">
                                                        <p>Report Year:</p>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 col-md-8 col-lg-9">
                                                    <select name="year" class="no-margin-top">
                                            <option value="{{ isset($data['year']) ? $data['year'] : '' }}" name="year" disabled="disabled" selected="selected">{{ isset($data['year']) ? $data['year'] : 'Select an option' }}</option>
                                            <option value="2014">2019</option>
                                            <option value="2014">2018</option>
                                            <option value="2014">2017</option>
                                            <option value="2014">2016</option>
                                            <option value="2014">2015</option>
                                            <option value="2014">2014</option>
                                            <option value="2013">2013</option>
                                            <option value="2012">2012</option>
                                            <option value="2011">2011</option>
                                            <option value="2010">2010</option>
                                            <option value="2009">2009</option>
                                            <option value="2008">2008</option>
                                            <option value="2007">2007</option>
                                            <option value="2006">2006</option>
                                            <option value="2005">2005</option>
                                            <option value="2004">2004</option>
                                            <option value="2003">2003</option>
                                            <option value="2002">2002</option>
                                            <option value="2001">2001</option>
                                            <option value="2000">2000</option>
                                            <option value="1999">1999</option>
                                            <option value="1998">1998</option>
                                            <option value="1997">1997</option>
                                            <option value="1996">1996</option>
                                            <option value="1995">1995</option>
                                            <option value="1994">1994</option>
                                            <option value="1993">1993</option>
                                            <option value="1992">1992</option>
                                            <option value="1991">1991</option>
                                            <option value="1990">1990</option>
                                            <option value="1989">1989</option>
                                            <option value="1988">1988</option>
                                            <option value="1987">1987</option>
                                            <option value="1986">1986</option>
                                            <option value="1985">1985</option>
                                            <option value="1984">1984</option>
                                            <option value="1983">1983</option>
                                            <option value="1982">1982</option>
                                            <option value="1981">1981</option>
                                            <option value="1980">1980</option>
                                            <option value="1979">1979</option>
                                            <option value="1978">1978</option>
                                            <option value="1977">1977</option>
                                            <option value="1976">1976</option>
                                            <option value="1975">1975</option>
                                            <option value="1974">1974</option>
                                            <option value="1973">1973</option>
                                            <option value="1972">1972</option>
                                            <option value="1971">1971</option>
                                            <option value="1970">1970</option>
                                            <option value="1969">1969</option>
                                            <option value="1968">1968</option>
                                            <option value="1967">1967</option>
                                            <option value="1966">1966</option>
                                            <option value="1965">1965</option>
                                            <option value="1964">1964</option>
                                            <option value="1963">1963</option>
                                            <option value="1962">1962</option>
                                            <option value="1961">1961</option>
                                            <option value="1960">1960</option>
                                            <option value="1959">1959</option>
                                            <option value="1958">1958</option>
                                            <option value="1957">1957</option>
                                            <option value="1956">1956</option>
                                            <option value="1955">1955</option>
                                            <option value="1954">1954</option>
                                            <option value="1953">1953</option>
                                            <option value="1952">1952</option>
                                            <option value="1951">1951</option>
                                            <option value="1950">1950</option>
                                            <option value="1949">1949</option>
                                            <option value="1948">1948</option>
                                            <option value="1947">1947</option>
                                            <option value="1946">1946</option>
                                            <option value="1945">1945</option>
                                            <option value="1944">1944</option>
                                            <option value="1943">1943</option>
                                            <option value="1942">1942</option>
                                            <option value="1941">1941</option>
                                            <option value="1940">1940</option>
                                            <option value="1939">1939</option>
                                            <option value="1938">1938</option>
                                            <option value="1937">1937</option>
                                            <option value="1936">1936</option>
                                            <option value="1935">1935</option>
                                            <option value="1934">1934</option>
                                            <option value="1933">1933</option>
                                            <option value="1932">1932</option>
                                            <option value="1931">1931</option>
                                            <option value="1930">1930</option>
                                            <option value="1929">1929</option>
                                            <option value="1928">1928</option>
                                            <option value="1927">1927</option>
                                            <option value="1926">1926</option>
                                            <option value="1925">1925</option>
                                            <option value="1924">1924</option>
                                            <option value="1923">1923</option>
                                            <option value="1922">1922</option>
                                            <option value="1921">1921</option>
                                            <option value="1920">1920</option>
                                            <option value="1919">1919</option>
                                            <option value="1918">1918</option>
                                            <option value="1917">1917</option>
                                            <option value="1916">1916</option>
                                            <option value="1915">1915</option>
                                            <option value="1914">1914</option>
                                            <option value="1913">1913</option>
                                            <option value="1912">1912</option>
                                            <option value="1911">1911</option>
                                            <option value="1910">1910</option>
                                            <option value="1909">1909</option>
                                            <option value="1908">1908</option>
                                            <option value="1907">1907</option>
                                            <option value="1906">1906</option>
                                            <option value="1905">1905</option>
                                            <option value="1904">1904</option>
                                            <option value="1903">1903</option>
                                            <option value="1902">1902</option>
                                            <option value="1901">1901</option>
                                            <option value="1900">1900</option>
                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row center-xs">
                                                <div class="col-xs-12 col-md-8">
                                                        <uploads-component
                                                            title="Upload Investor Report"
                                                            type="single"
                                                            action="/files"
                                                            elname="file"
                                                            scope="private"
                                                            field="report-documents"
                                                            multi="yes"
                                                            section="reports"
                                                            path="/reports/documents/">
                                                        </uploads-component>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-6 padding-left-l-lg">
                                            <div class="content-form">
                                                <p class="no-margin">Choose an Available Document:</p>
                                                <select>
                                                    <option value="" selected="selected">Select an option</option>
                                                    <option value="option">2018 - DST Report</option>
                                                </select>
                                            </div>
                                            <div class="row margin-top-m">
                                                <div class="col-xs-12 col-sm-6">
                                                    <div class="btn full-width margin-bottom-m-sm"><a href="/img/dst-report.pdf" style="color: #fff !important;" target="_blank">PDF</a></div>
                                                </div>
                                                <div class="col-xs-12 col-sm-6">
                                                    <div class="btn dust full-width">CSV</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="content-footer">
                                                <div class="row center-xs">
                                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                        <div class="content-footer-step">
                                                            <div class="row">
                                                                <div class="col-xs">
                                                                    <div class="step-item active"></div>
                                                                </div>
                                                                <div class="col-xs">
                                                                    <div class="step-item"></div>
                                                                </div>
                                                                <div class="col-xs">
                                                                    <div class="step-item"></div>
                                                                </div>
                                                                <div class="col-xs">
                                                                    <div class="step-item"></div>
                                                                </div>
                                                                <div class="col-xs">
                                                                    <div class="step-item"></div>
                                                                </div>
                                                            </div>
                                                            <div class="step-divider"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="footer-button-next">
                                                    <input type="submit" value="Save">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
@endsection