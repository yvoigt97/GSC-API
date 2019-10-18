#!/usr/bin/python
# -*- coding: utf-8 -*-
#
# Copyright 2015 Google Inc. All Rights Reserved.
#
# Licensed under the Apache License, Version 2.0 (the "License");
# you may not use this file except in compliance with the License.
# You may obtain a copy of the License at
#
#      http://www.apache.org/licenses/LICENSE-2.0
#
# Unless required by applicable law or agreed to in writing, software
# distributed under the License is distributed on an "AS IS" BASIS,
# WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
# See the License for the specific language governing permissions and
# limitations under the License.

"""Example for using the Google Search Analytics API (part of Search Console API).

A basic python command-line example that uses the searchAnalytics.query method
of the Google Search Console API. This example demonstrates how to query Google
search results data for your property. Learn more at
https://developers.google.com/webmaster-tools/

To use:
1) Install the Google Python client library, as shown at https://developers.google.com/webmaster-tools/v3/libraries.
2) Sign up for a new project in the Google APIs console at https://code.google.com/apis/console.
3) Register the project to use OAuth2.0 for installed applications.
4) Copy your client ID, client secret, and redirect URL into the client_secrets.json file included in this package.
5) Run the app in the command-line as shown below.

Sample usage:

  $ python search_analytics_api_sample.py 'https://www.example.com/' '2015-05-01' '2015-05-30'

"""
from __future__ import print_function

import argparse
import sys
from googleapiclient import sample_tools

import json

# Declare command-line flags.
argparser = argparse.ArgumentParser(add_help=False)
argparser.add_argument('property_uri', type=str,
                       help=('Site or app URI to query data for (including '
                             'trailing slash).'))
argparser.add_argument('start_date', type=str,
                       help=('Start date of the requested date range in '
                             'YYYY-MM-DD format.'))
argparser.add_argument('end_date', type=str,
                       help=('End date of the requested date range in '
                             'YYYY-MM-DD format.'))
argparser.add_argument('subdomain', type=str,
                       help=('Expression to filter output by.'))


def main(argv):
    service, flags = sample_tools.init(
        argv, 'webmasters', 'v3', __doc__, __file__, parents=[argparser],
        scope='https://www.googleapis.com/auth/webmasters.readonly')

    # First run a query to learn which dates we have data for. You should always
    # check which days in a date range have data before running your main query.
    # This query shows data for the entire range, grouped and sorted by day,
    # descending; any days without data will be missing from the results.
    # request = {
    #     'startDate': flags.start_date,
    #     'endDate': flags.end_date,
    #     'dimensions': ['date']
    # }
    # response = execute_request(service, flags.property_uri, request)
    # print_table(response, 'Available dates')

    #  Get totals for the date range.
    # request = {
    #     'startDate': flags.start_date,
    #     'endDate': flags.end_date
    # }
    # response = execute_request(service, flags.property_uri, request)
    # print_table(response, 'Totals')

    # Get top 10 queries for the date range, sorted by click count, descending.
    # request = {
    #     'startDate': flags.start_date,
    #     'endDate': flags.end_date,
    #     'dimensions': ['query'],
    #     'rowLimit': 1000
    # }
    # response = execute_request(service, flags.property_uri, request)
    # print_table(response, 'Top Queries')

    # Get top 11-20 mobile queries for the date range, sorted by click count, descending.
    # request = {
    #     'startDate': flags.start_date,
    #     'endDate': flags.end_date,
    #     'dimensions': ['query'],
    #     'dimensionFilterGroups': [{
    #         'filters': [{
    #             'dimension': 'device',
    #             'expression': 'mobile'
    #         }]
    #     }],
    #     'rowLimit': 10,
    #     'startRow': 10
    # }
    # response = execute_request(service, flags.property_uri, request)
    # print_table(response, 'Top 11-20 Mobile Queries')

    # Get top 1000 pages for the date range, sorted by click count, descending.
    # request = {
    #     'startDate': flags.start_date,
    #     'endDate': flags.end_date,
    #     'dimensions': ['page'],
    #     'rowLimit': 1000
    # }
    # response = execute_request(service, flags.property_uri, request)
    # print_table(response, 'Top Pages')

    # Get the top 10 queries in Germany, sorted by click count, descending.
    # request = {
    #     'startDate': flags.start_date,
    #     'endDate': flags.end_date,
    #     'dimensions': ['query'],
    #     'dimensionFilterGroups': [{
    #         'filters': [{
    #             'dimension': 'country',
    #             'expression': 'deu'
    #         }]
    #     }],
    #     'rowLimit': 10
    # }
    # response = execute_request(service, flags.property_uri, request)
    # print_table(response.encode('utf-8'), 'Top queries in Germany')

    # Group by both country and device.
    # request = {
    #     'startDate': flags.start_date,
    #     'endDate': flags.end_date,
    #     'dimensions': ['country', 'device'],
    #     'rowLimit': 10
    # }
    # response = execute_request(service, flags.property_uri, request)
    # print_table(response, 'Group by country and device')

    # Group by total number of Search Appearance count.
    # Note: It is not possible to use searchAppearance with other
    # dimensions.
    # request = {
    #     'startDate': flags.start_date,
    #     'endDate': flags.end_date,
    #     'dimensions': ['searchAppearance'],
    #     'rowLimit': 10
    # }
    # response = execute_request(service, flags.property_uri, request)
    # print_table(response, 'Search Appearance Features')

    # request = {
    #     "startDate": flags.start_date,
    #     "endDate": flags.end_date,
    #     "searchType": "web",
    #     "dimensions":
    #         ["searchAppearance"]
    # }
    # response = execute_request(service, flags.property_uri, request)
    # print_table(response, 'test')

    # j = open('/www/htdocs/w010903c/gsc.digitalagenten.com/assets/data/vt.json', "r")
    # vt = json.load(j)
    # j.close()
    #
    # f = open("/www/htdocs/w010903c/gsc.digitalagenten.com/assets/data/results.json", "w")
    #
    # for key, value in vt.items():
    #     print(key)
    #     for d in value:
    #         print(value[d])
    #         for url in value[d]:
    #             print(url)
    #             request = {
    #                 "startDate": flags.start_date,
    #                 "endDate": flags.end_date,
    #                 "searchType": "web",
    #                 "dimensions": ["query"],
    #                 "dimensionFilterGroups": [
    #                     {
    #                         "filters": [
    #                             {
    #                                 "dimension": "page",
    #                                 "operator": "equals",
    #                                 "expression": url
    #                             }
    #                         ]
    #                     }
    #                 ]
    #             }
    #             print(request)
    #             response = execute_request(service, flags.property_uri, request)
    #             print_table(response, key)
    # f.close()

    request = {
        'startDate': flags.start_date,
        'endDate': flags.end_date,
        'searchType': 'web',
        'dimensions': ['query'],
        'dimensionFilterGroups': [
            {
                'filters':
                    [
                        {
                            'dimension': 'page',
                            'operator': 'equals',
                            'expression': flags.subdomain
                        }
                    ]
            }
        ]
    }
    response = execute_request(service, flags.property_uri, request)
    print_table(response, "Test")


def execute_request(service, property_uri, request):
    return service.searchanalytics().query(
        siteUrl=property_uri, body=request).execute()


def print_table(response, title):
    data = json.dumps(response)
    print(data)


if __name__ == '__main__':
    main(sys.argv)
